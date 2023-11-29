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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('EmpID');
            $table->char('EmpName', 20)->nullable(false);
            $table->integer('DeptId')->unsigned()->nullable(true);
            $table->foreign('DeptId')->references('DepartementId')->on('departments')->onDelete('cascade');
            $table->text('password');
            $table->boolean('status');
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
};
