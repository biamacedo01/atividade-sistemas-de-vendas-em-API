<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_vendas', function (Blueprint $table) {
            $table->id();
            $table->bigIncrements('venda_id')->unsigned()->nullable(false);
            $table->foreign('venda_id')->references('id')->on('vendas');
            $table->bigIncrements('produto_id')->unsigned()->nullable(false);
            $table->foreign('produto_id')->references('id')->on('produto');
            $table->integer('quantidade')->nullable(false);
            $table->decimal('preco_unitario',10,2)->nullable(false);
            $table->decimal('subtotal_item',10,2)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_vendas');
    }
};
