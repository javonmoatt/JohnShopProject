<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('extension');
            $table->string('email');
            $table->integer('officeCode')->unsigned();
            $table->foreign('officeCode')->references('id')->on('offices');
            $table->integer('reportsTo')->unsigned()->nullable();
            $table->foreign('reportsTo')->references('id')->on('employees');
            $table->integer('jobTitle');
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
        Schema::dropIfExists('employees');
    }
}
