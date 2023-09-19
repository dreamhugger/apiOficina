<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('db_oficina', function (Blueprint $table) {
            $table->id();
            $table->string('Modelo');
            $table->string('Processador');
            $table->string('OS');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('db_oficina');
    }
};
