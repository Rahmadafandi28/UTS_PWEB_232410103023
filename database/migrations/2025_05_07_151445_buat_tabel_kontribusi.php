<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kontribusi', function (Blueprint $table) {
            $table->id();
            $table->string('Kategori');
            $table->string('Contoh_Barang');
            $table->text('Cara_Pemilahan');
            $table->string('Tempat_Pembuangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontribusi');
    }
};
