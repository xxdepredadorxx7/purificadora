<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        static::creating(function ($pedido) {
        $pedido->total = $pedido->producto->precio * $pedido->cantidad;
    });

        parent::boot();

        // Reducir la cantidad del producto al crear un pedido
        static::creating(function ($pedido) {
            $producto = Producto::find($pedido->producto_id);

            DB::transaction(function () use ($pedido, $producto) {
                $producto->decrement('cantidad', $pedido->cantidad);
            });
            if ($producto) {
                if ($producto->cantidad >= $pedido->cantidad) {
                    $producto->cantidad -= $pedido->cantidad;
                    $producto->save();
                } else {
                    throw new \Exception('No hay suficiente cantidad para este pedido.');
                }
            }
        });

        // Manejar cambios en el estado del pedido
        static::updating(function ($pedido) {
            $originalEstado = $pedido->getOriginal('estado');
            $producto = Producto::find($pedido->producto_id);

            if ($producto) {
                // Si el pedido se cancela, devolver la cantidad al producto
                if ($originalEstado !== 'cancelado' && $pedido->estado === 'cancelado') {
                    $producto->cantidad += $pedido->cantidad;
                    $producto->save();
                }

                // Si el pedido se reactiva desde "cancelado", reducir la cantidad nuevamente
                if ($originalEstado === 'cancelado' && $pedido->estado !== 'cancelado') {
                    if ($producto->cantidad >= $pedido->cantidad) {
                        $producto->cantidad -= $pedido->cantidad;
                        $producto->save();
                    } else {
                        throw new \Exception('No hay suficiente cantidad para reactivar este pedido.');
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
