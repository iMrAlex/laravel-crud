<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory; // Agrega esto
    
    //protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];

    // Relacion de uno a muchos con Productos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
