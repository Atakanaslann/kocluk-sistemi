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
        Schema::create('topics', function (Blueprint $table) {
            $table->bigIncrements('id'); // Birincil anahtar (id)
            $table->unsignedBigInteger('subject_id'); // İlgili dersin ID'si
            $table->string('name'); // Konu adı
            $table->text('description')->nullable(); // Konu açıklaması (opsiyonel)
            $table->timestamps(); // created_at ve updated_at sütunları

            // Yabancı anahtar
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
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
