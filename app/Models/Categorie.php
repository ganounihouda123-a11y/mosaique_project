<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;

    public function campagne(){
        return $this->hasMany(Campagne::class,'id_categorie');
    }
}
