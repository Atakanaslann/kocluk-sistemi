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
        Schema::create('coach_student', function (Blueprint $table) {
            $table->bigIncrements('id'); // Birincil anahtar (id)
            $table->unsignedBigInteger('coach_id'); // Koç ID'si
            $table->unsignedBigInteger('student_id'); // Öğrenci ID'si
            $table->enum('status', ['pending', 'active', 'inactive']); // Eşleşme durumu
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
