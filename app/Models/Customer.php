<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    Protected $table = "customers";
    Protected $primarykey = "id";

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'photo',
    ];

    protected $hidden=[
        'password',
    ];
}
