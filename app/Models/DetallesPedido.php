<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;

    protected $table = 'detalles_pedido';
    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
