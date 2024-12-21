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
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id'); // Birincil anahtar (id)
            $table->unsignedBigInteger('coach_id'); // Görevi veren koçun ID'si
            $table->unsignedBigInteger('student_id'); // Görevi alan öğrencinin ID'si
            $table->string('title'); // Görevin başlığı
            $table->text('description')->nullable(); // Görevin açıklaması
            $table->enum('status', ['pending', 'completed', 'failed']); // Görev durumu
            $table->date('due_date'); // Görevin son teslim tarihi
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
