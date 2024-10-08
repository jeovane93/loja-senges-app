<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nome','descricao'];
    
    //category_id
    public function produtos(){
        return $this->hasMany(Products::class,'id_category');
    }
}