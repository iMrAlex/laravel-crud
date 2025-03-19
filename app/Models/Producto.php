<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory; // Agrega esto

    // protected $table = 'productos';
    // protected $primaryKey = 'id';

    protected $fillable = [
        'categoria_id',
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen',
        'estado'
    ];

    // Relacion inversar de con Categoria
    // Relacion de muchos a uno con Categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

}
