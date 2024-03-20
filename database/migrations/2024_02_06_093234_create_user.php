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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('uuid');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nid');
            $table->string('name');
            $table->string('gender');
            $table->date('dob');
            $table->string('phone');
            $table->string('currentisland');
            $table->string('currentaddress');
            $table->string('registeredisland');
            $table->string('registeredaddress');
            $table->string('country');
            $table->string('useridcopy')->nullable();
            $table->string('role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
