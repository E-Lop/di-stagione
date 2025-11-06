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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome italiano del prodotto
            $table->string('name_en')->nullable(); // Nome inglese
            $table->enum('type', ['frutta', 'verdura']); // Tipo di prodotto
            $table->text('description'); // Descrizione del prodotto
            $table->string('image_url')->nullable(); // URL dell'immagine
            $table->string('slug')->unique(); // Slug per URL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
