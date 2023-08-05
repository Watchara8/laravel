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
        Schema::create('challenge_data', function (Blueprint $table) {
            $table->id();
            $table->string('val_of_H');
            $table->string('val_of_I');
            $table->string('val_of_E');
            $table->string('val_of_R');
            $table->string('val_of_G');
            $table->string('val_of_B');
            $table->string('val_of_T');
            $table->string('val_of_S');
            $table->string('val_of_N');
            $table->string('val_of_U');
            $table->string('expression_1');
            $table->string('expression_2');
            $table->string('expression_3');
            $table->string('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_data');
    }
};
