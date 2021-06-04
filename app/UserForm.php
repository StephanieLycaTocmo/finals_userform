<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    
    protected $fillable = [
        'last_name',
        'first_name',
        'phone',
        'email',
    ];
}
