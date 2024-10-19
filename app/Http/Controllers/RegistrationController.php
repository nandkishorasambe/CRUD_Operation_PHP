<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index(){
       
        $customers = Customer::all(); // Retrieve all customers
        return view('form', compact('customers'));
    }

    public function register(Request $request){

    $validated = $request->validate([
        'name' => 'required|string|max:60',
        'email' => 'required|string|email|max:100|unique:customers,email',
        'mobile' => 'required|digits_between:10,15|unique:customers,mobile',
        'password' => 'required|string|min:8',
        'photo' => 'nullable|image|mimes:jpeg,jpg|max:2048',
    ]);

   
    $photoPath = $request->hasFile('photo') 
                ? $request->file('photo')->store('photos', 'public') 
                : null;

    
    Customer::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'mobile' => $validated['mobile'],
        'password' => Hash::make($validated['password']),
        'photo' => $photoPath,
    ]);

    return redirect('/register')->with('success', 'Customer created successfully!');
    
}
public function edit($id)
{
    $customer = Customer::findOrFail($id);
    return view('edit', compact('customer'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:60',
        'email' => 'required|string|email|max:100|unique:customers,email,'.$id,
        'mobile' => 'required|digits_between:10,15|unique:customers,mobile,'.$id,
        'photo' => 'nullable|image|mimes:jpeg,jpg|max:2048',
    ]);

    $customer = Customer::findOrFail($id);
    $customer->name = $validated['name'];
    $customer->email = $validated['email'];
    $customer->mobile = $validated['mobile'];

    if ($request->hasFile('photo')) {
        // Handle file upload
        $photoPath = $request->file('photo')->store('photos', 'public');
        $customer->photo = $photoPath;
    }

    $customer->save();

    return redirect('/register')->with('success', 'Customer updated successfully!');
}

public function destroy($id)
{
    $customer = Customer::findOrFail($id);
    $customer->delete();

    return redirect('/register')->with('success', 'Customer deleted successfully!');
}

}