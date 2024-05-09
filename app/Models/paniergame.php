<?php

namespace App\Models;
use App\Models\paniergame;
use App\Models\game;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paniergame extends Model
{
    use HasFactory;

    protected $fillable = [
        'IDUG',
        'user_id',
        'IDG',
        'EtatAchat',
    ];
    public function game()
    {
        return $this->belongsTo(Game::class, 'IDG'); 
    }

}
