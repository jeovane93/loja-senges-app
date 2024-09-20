<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco', 'slug', 'image', 'id_category', 'id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function categoty()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
