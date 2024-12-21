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
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id'); // Birincil anahtar (id)
            $table->string('name'); // Ders adı
            $table->text('description')->nullable(); // Ders açıklaması (opsiyonel)
            $table->timestamps(); // created_at ve updated_at sütunları
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
