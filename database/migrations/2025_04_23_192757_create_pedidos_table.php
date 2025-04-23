<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Cliente que realiza el pedido
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade'); // Producto solicitado
            $table->integer('cantidad'); // Cantidad del producto
            $table->decimal('total', 8, 2); // Total del pedido
            $table->string('estado')->default('pendiente'); // Estado del pedido (pendiente, completado, cancelado)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
}
