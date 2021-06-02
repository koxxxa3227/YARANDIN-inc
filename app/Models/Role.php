<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
//    roles
const ROLE_ADMIN = 1;
const ROLE_MODER = 2;
const ROLE_USER = 3;

    use HasFactory;
    public $timestamps = false;
}
