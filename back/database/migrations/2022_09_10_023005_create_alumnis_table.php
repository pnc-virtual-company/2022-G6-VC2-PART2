<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('gender');
            $table->string('phone');
            $table->string('profile')->nullable();
            $table->string('batch');
            $table->string('major');
            $table->string('address');
            $table->string('dateOfBirth');
            $table->string('placeOfBirth');
            $table->string('linkIn')->nullable();
            $table->string('telegram')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnis');
    }
};
