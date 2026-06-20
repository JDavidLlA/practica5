<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sitio extends Model
{
    protected $fillable = [
    'titulo',
    'url',
    'categoria',
    'descripcion',
    'destacado',
];

public function user()
{
    return $this->belongsTo(User::class);
}
}
