<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $table = 'marcas';
    protected $fillable = [
        'nombre',
        'descripcion',
        'estatus',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'marca_id');
    }
}
