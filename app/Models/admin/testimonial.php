<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'second_name',
        'description',
        'image',
        'type'
    ];
}
