<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relasi ke users
            $table->float('nilai_matematika')->nullable();
            $table->float('nilai_ipa')->nullable();
            $table->float('nilai_ips')->nullable();
            $table->float('nilai_bahasa_indonesia')->nullable();
            $table->float('nilai_rata_rata')->nullable(); // Auto-hitung
            $table->timestamps();

            // Foreign key untuk user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
