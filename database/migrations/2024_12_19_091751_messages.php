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
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id'); // Birincil anahtar (id)
            $table->unsignedBigInteger('sender_id'); // Mesajı gönderen kullanıcının ID'si
            $table->unsignedBigInteger('receiver_id'); // Mesajı alan kullanıcının ID'si
            $table->text('message'); // Mesaj içeriği
            $table->enum('status', ['read', 'unread'])->default('unread'); // Okunma durumu
            $table->timestamps(); // created_at ve updated_at sütunları

            // Yabancı anahtarlar
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
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
