<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentmonthStudentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentmonth_student', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_months_id')->index();
            $table->foreign('payment_months_id')->references('id')->on('payment_months')->onDelete('cascade');
            $table->unsignedBigInteger('students_id')->index();
            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');
            $table->primary(['payment_months_id', 'students_id']);
            $table->double('amount', 8, 2)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->string('ip',16)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paymentmonth_student');
    }
}
