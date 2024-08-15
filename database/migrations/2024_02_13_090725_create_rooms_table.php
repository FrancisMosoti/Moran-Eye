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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_no');
            $table->string('user_id');
            $table->string('apartment_id');
            $table->string('pic_1');
            $table->string('pic_2');
            $table->string('pic_3');
            $table->string('pic_4');
            $table->string('price');
            $table->string('status1')->default('vacant');
            $table->string('status2')->default('not paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
