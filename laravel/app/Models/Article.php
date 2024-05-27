<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Liste des attributs 
    protected $fillable = ['nom', 'description', 'date_creation', 'a_la_une', 'image'];
}
