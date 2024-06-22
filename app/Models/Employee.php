<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Columns that can be filled in via mass assignment
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone_number',
        'position',
        'status',
    ];
}
