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
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('contract_type')->nullable();
            $table->date('contract_end_date')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_details');
    }
};
