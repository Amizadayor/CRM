<?php

namespace App\Models;

use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'cantidad_disponible',
        'estatus',
        'precio',
        'descripcion',
        'talla',
        'color',
        'ultima_actualizacion',
        'categoria_id',
        'marca_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }
}
