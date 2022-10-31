<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->date('dob')->nullable();
             $table->string('address', 250)->nullable();
            $table->string('parent_name', 100)->nullable();
            $table->tinyInteger('gender')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('dob');
            $table->dropColumn('address');
            $table->dropColumn('parent_name');
            $table->dropColumn('gender');
        });
    }
}
