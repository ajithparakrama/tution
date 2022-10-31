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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 100);
            $table->string('nic', 13)->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('phone1', 11)->nullable();
            $table->string('parent_contact', 11)->nullable();
            $table->string('parent_contact1', 11)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('avatar', 50)->nullable();
            $table->string('remarks', 500)->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
