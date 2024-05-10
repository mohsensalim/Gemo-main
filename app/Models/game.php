<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    use HasFactory;

    protected $fillable = [
        'IDG',
        'title',
        'Main_picture',
        'description',
        'Screen1',
        'Screen2',
        'Screen3',
        'date_publishing',
        'jeux_prix',
        'category',
        'download_path',
        'etat_jeux',
        'ECIN',
        'id',
        'ID_Pack',
    ];

    public function paniergames()

    {

        return $this->hasMany(paniergame::class);

    }
    
}
