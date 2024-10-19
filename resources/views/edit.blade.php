<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Customer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Edit Customer</h1>
        <form action="{{ route('customers.update', $customer->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $customer->email }}" required>
            </div>

            <div class="form-group">
                <label for="">Mobile</label>
                <input type="number" class="form-control" name="mobile" value="{{ $customer->mobile }}" required>
            </div>

            <div class="form-group">
                <label for="">Photo</label>
                <input type="file" class="form-control" name="photo">
                @if ($customer->photo)
                    <img src="{{ asset('storage/' . $customer->photo) }}" alt="Customer Photo" style="width: 100px; height: auto;">
                @endif
            </div>

            <button class="btn btn-primary" type="submit">Update</button>
        </form>

        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="margin-top: 20px;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete Customer</button>
        </form>
    </div>
</body>
</html>
