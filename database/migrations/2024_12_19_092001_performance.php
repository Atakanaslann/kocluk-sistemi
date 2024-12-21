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
        Schema::create('performance_records', function (Blueprint $table) {
            $table->bigIncrements('id'); // Birincil anahtar (id)
            $table->unsignedBigInteger('student_id'); // Öğrencinin ID'si
            $table->unsignedBigInteger('subject_id'); // Dersin ID'si
            $table->unsignedBigInteger('topic_id'); // Konunun ID'si
            $table->integer('questions_solved'); // Çözülen soru sayısı
            $table->integer('correct_answers'); // Doğru cevap sayısı
            $table->integer('incorrect_answers'); // Yanlış cevap sayısı
            $table->timestamps(); // created_at ve updated_at sütunları

            // Yabancı anahtarlar
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
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
