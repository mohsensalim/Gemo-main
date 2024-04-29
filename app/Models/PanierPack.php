<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panierpack extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id_PP',
        'user_id',
        'Id_Pack',
    ];

}
