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
        Schema::create('employee_salarys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->decimal('basic_salary', 15, 2)->nullable();
            $table->string('unit')->nullable()->default('$');
            $table->decimal('allowance', 10, 2)->nullable();
            $table->decimal('bonus', 10, 2)->nullable();
            $table->decimal('penalty', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_salarys');
    }
};
