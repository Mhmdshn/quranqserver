<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string("nickname");
            $table->string("livingIn");
            $table->string("aboutme");
            $table->string("photo")->nullable();
            $table->string("education")->nullable();
            $table->string("job")->nullable();
            $table->string("salary")->nullable();
            $table->string("willing2relocate")->nullable();
            $table->string("profilepostedby")->nullable();
            $table->string("maritalstatus")->nullable();
            $table->string("noofmarriages")->nullable();
            $table->string("children")->nullable();
            $table->string("kids_staying_at")->nullable();
            $table->string("like_to_have_children")->nullable();
            $table->string("polygyny")->nullable();
            $table->string("health")->nullable();
            $table->string("pray")->nullable();
            $table->string("languages")->nullable();
            $table->string("origin")->nullable();
            $table->string("haircolor")->nullable();
            $table->string("bodytype")->nullable();
            $table->string("height")->nullable();
            $table->string("dresscode")->nullable();
            $table->string("l4_atoll")->nullable();
            $table->string("l4_island")->nullable();
            $table->string("l4_age_range_start")->nullable();
            $table->string("l4_age_range_end")->nullable();
            $table->string("l4_willing2relocate")->nullable();
            $table->string("l4_maritalstatus")->nullable();
            $table->string("l4_noofmarriages")->nullable();
            $table->string("l4_children")->nullable();
            $table->string("l4_kids_staying_at")->nullable();
            $table->string("l4_like_to_have_children")->nullable();
            $table->string("l4_poligyny")->nullable();
            $table->string("l4_languages")->nullable();
            $table->string("l4_pray")->nullable();
            $table->string("l4_origin")->nullable();
            $table->string("l4_haircolor")->nullable();
            $table->string("l4_bodytype")->nullable();
            $table->string("l4_height")->nullable();
            $table->string("l4_dresscode")->nullable();
            $table->string("l4_profession")->nullable();
            $table->string("l4_minimum_qualification")->nullable();
            $table->string("l4_other")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
