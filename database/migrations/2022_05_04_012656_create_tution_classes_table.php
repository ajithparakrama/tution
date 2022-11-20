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
        Schema::create('tution_classes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 100);
            $table->tinyInteger('type');     
   //        $table->string('location', 100)->nullable();
            $table->bigInteger('hall_id')->nullable();
            $table->bigInteger('teacher_id');
            $table->bigInteger('subjects_id');
      #      $table->foreign('subjects_id')->references('id')->on('subjects')->onDelete('cascade');
      #      $table->foreign('teacher_id')->references('id')->on('users')->onDelete('null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tution_classes');
    }
};
