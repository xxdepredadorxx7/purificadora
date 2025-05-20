<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
    ];

    protected $casts = [
    'precio' => 'decimal:2',  // Asegura 2 decimales
    'cantidad' => 'integer',
];

    public function pedidos() {
    return $this->hasMany(Pedido::class);
}

}
