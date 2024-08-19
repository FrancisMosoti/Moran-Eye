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
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('serial_code')->unique();
            $table->string('breed');
            $table->date('dob'); // Date of birth
            $table->string('purpose');
            $table->text('vaccination_health_records')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->string('image')->nullable(); // Path to the cow image
            $table->string('qr_code_path')->nullable(); // Path to the QR code image
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccines');
    }
};