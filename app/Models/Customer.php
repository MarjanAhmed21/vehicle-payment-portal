<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Only allow name & postcode to be mass assignable
    protected $fillable = ['name', 'postcode'];
}
