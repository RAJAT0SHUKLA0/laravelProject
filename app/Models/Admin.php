<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // ✅ Import the trait

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // ✅ Add HasApiTokens here

    protected $table = 'tbl_admin';
}
