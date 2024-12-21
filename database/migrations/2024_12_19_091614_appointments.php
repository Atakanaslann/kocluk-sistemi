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
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id'); // Birincil anahtar (id)
            $table->unsignedBigInteger('coach_id'); // Koçun ID'si
            $table->unsignedBigInteger('student_id'); // Öğrencinin ID'si
            $table->date('date'); // Randevu tarihi
            $table->time('time'); // Randevu saati
            $table->enum('status', ['scheduled', 'completed', 'cancelled']); // Randevu durumu
            $table->text('notes')->nullable(); // Görüşme notları
            $table->timestamps(); // created_at ve updated_at sütunları

            // Yabancı anahtarlar
            $table->foreign('coach_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
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
