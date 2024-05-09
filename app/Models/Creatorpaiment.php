<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creatorpaiment extends Model
{
    use HasFactory;


    protected $fillable = [
        'ID_CP', 
        'Mode_Paiment',
        'Identifiant',
        'Amount',
        'Date_Paiment',
        'Etat_Paiment',
        'id' 
      
    ];

    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }

}
