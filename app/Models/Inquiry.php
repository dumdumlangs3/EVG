<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'contact_number', 'message'];

    protected $attributes = [
        'contact_number' => null, 
    ];
    
}
