<?php

use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cliente::class)->references('id')->on('clientes')->onDelete('CASCADE');
            $table->foreignIdFor(Produto::class)->references('id')->on('produtos')->onDelete('CASCADE');
            $table->integer('quantidade')->nullable(false);
            $table->double('valor');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('vendas', function (Blueprint $table) {
            $table->dropForeignIdFor(Cliente::class);
            $table->dropForeignIdFor(Produto::class);
        });
        Schema::dropIfExists('vendas');
    }
};
