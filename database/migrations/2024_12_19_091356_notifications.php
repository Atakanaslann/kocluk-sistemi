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
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id'); // Birincil anahtar (id)
            $table->unsignedBigInteger('user_id'); // Bildirimin gönderileceği kullanıcının ID'si
            $table->string('type'); // Bildirim tipi (appointment_reminder, task_due, vb.)
            $table->text('message'); // Bildirim içeriği
            $table->enum('status', ['read', 'unread'])->default('unread'); // Okunma durumu
            $table->timestamps(); // created_at ve updated_at sütunları

            // Yabancı anahtar
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
