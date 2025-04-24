<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'producto_id',
        'cantidad',
        'total',
        'estado',
    ];

    protected static function boot()
    {
        parent::boot();

        // Reducir inventario al crear un pedido
        static::creating(function ($pedido) {
            $producto = Producto::find($pedido->producto_id);
            if ($producto && $producto->inventario) {
                if ($producto->inventario->cantidad >= $pedido->cantidad) {
                    $producto->inventario->cantidad -= $pedido->cantidad;
                    $producto->inventario->save();
                } else {
                    throw new \Exception('No hay suficiente inventario para este pedido.');
                }
            }
        });

        // Manejar cambios en el estado del pedido
        static::updating(function ($pedido) {
            $originalEstado = $pedido->getOriginal('estado');
            $producto = Producto::find($pedido->producto_id);

            if ($producto && $producto->inventario) {
                // Si el pedido se cancela, devolver la cantidad al inventario
                if ($originalEstado !== 'cancelado' && $pedido->estado === 'cancelado') {
                    $producto->inventario->cantidad += $pedido->cantidad;
                    $producto->inventario->save();
                }

                // Si el pedido se reactiva desde "cancelado", reducir el inventario nuevamente
                if ($originalEstado === 'cancelado' && $pedido->estado !== 'cancelado') {
                    if ($producto->inventario->cantidad >= $pedido->cantidad) {
                        $producto->inventario->cantidad -= $pedido->cantidad;
                        $producto->inventario->save();
                    } else {
                        throw new \Exception('No hay suficiente inventario para reactivar este pedido.');
                    }
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
