<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDishes extends Model
{
    use HasFactory;


    protected $table = 'user_dishes';


    protected $fillable = [
        'title',
        'price',
        'description',
        'image'
    ];

}
