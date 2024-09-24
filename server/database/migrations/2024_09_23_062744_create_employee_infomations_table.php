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
        Schema::create('employee_infomations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('full_name');
            $table->integer('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('nationality')->nullable();
            $table->string('identity_number')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_infomations');
    }
};
