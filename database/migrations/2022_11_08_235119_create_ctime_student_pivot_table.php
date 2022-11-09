<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCtimeStudentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctime_student', function (Blueprint $table) {
            $table->unsignedBigInteger('ctime_id')->index();
            $table->foreign('ctime_id')->references('id')->on('ctimes')->onDelete('cascade');
            $table->unsignedBigInteger('student_id')->index();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->primary(['ctime_id', 'student_id']);
            $table->unsignedBigInteger('create_by');
            $table->unsignedBigInteger('update_by');
            $table->timestamps();
            $table->string('ip',16)->nullable();
            $table->string('up_ip',16)->nullable();
            $table->tinyInteger('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctime_student');
    }
}
