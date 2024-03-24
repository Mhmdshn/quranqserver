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
        Schema::create('takens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vid');
            $table->string('grade');
            $table->string('studentNid', 150);
            $table->foreign('studentNid')->references('nid')->on('students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('takens');
    }
};
