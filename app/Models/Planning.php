<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planning extends Model
{
    use HasFactory;

    public function campagne(){
        return $this->hasMany(Campagne::class,'id_planning');
    }
    public function client(){
        return $this->hasMany(Client::class,'id_client');
    }
}
