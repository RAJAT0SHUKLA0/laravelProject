<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubCategory extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'tbl_subcategory';
}
