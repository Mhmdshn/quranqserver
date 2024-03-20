<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'uuid',
        'email',
        'password',
        'nid',
        'name',
        'gender',
        'dob',
        'phone',
        'currentisland',
        'currentaddress',
        'registeredisland',
        'registeredaddress',
        'country',
        'useridcopy'
    ];
}
