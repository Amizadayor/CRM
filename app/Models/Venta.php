<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';
    protected $fillable = [
        'pedido_id',
        'fecha_venta',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class, 'venta_id');
    }
}
