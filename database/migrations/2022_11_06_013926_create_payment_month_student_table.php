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
        Schema::table('payment_month_student', function (Blueprint $table) {
            $table->bigInteger('payment_month_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
           $table->smallInteger('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_month_student', function (Blueprint $table) {
            
        });
    }
};
