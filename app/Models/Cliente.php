<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'ciudad',
        'estado',
        'codigo_postal',
        'estatus',
        'fecha_registro',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
