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
        Schema::create('data_entries', function (Blueprint $table) {
            $table->id();
            
            $table->string('user_id');
            $table->string('serial_code');
            $table->string('task_description');
            $table->foreign('serial_code')->references('serial_code')->on('cows')->onDelete('cascade');
            
            $table->string('quantity');
            $table->text('worker_notes')->nullable();
            $table->timestamp('date_time');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_entries');
    }
};