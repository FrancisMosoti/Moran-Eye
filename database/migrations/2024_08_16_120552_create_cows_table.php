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
        Schema::create('cows', function (Blueprint $table) {
            $table->id();
            $table->string('serial_code')->unique();
            $table->string('breed');
            $table->date('dob'); // Date of birth
            $table->string('purpose');
            $table->text('vaccination_health_records')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->string('image')->nullable(); // Path to the cow image
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Foreign key constraint to link the cow to the user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cows');
    }
};
