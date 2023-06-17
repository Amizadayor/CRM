<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\DetallesPedido;
use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $fillable = [
        'cliente_id',
        'fecha_pedido',
        'estatus',
        'cantidad_productos',
        'total_pago',
        'metodo_pago',
        'metodo_envio',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function detallesPedido()
    {
        return $this->hasMany(DetallesPedido::class, 'pedido_id');
    }

    public function venta()
    {
        return $this->hasOne(Venta::class, 'pedido_id');
    }
}
