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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('juz');
            $table->integer('sura_number');
            $table->string('sura_name_ar');
            $table->integer('aya_number');
            $table->string('verse_id');
            $table->string('verse_id2');
            $table->integer('page');
            $table->unsignedBigInteger('vid');
            $table->text('first_verse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
