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
        Schema::create('list_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_kelas_id');
            $table->foreign('user_kelas_id')->references('id')->on('users');
            $table->unsignedBigInteger('kelas_user_id');
            $table->foreign('kelas_user_id')->references('id')->on('classes');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_kelas');
    }
};