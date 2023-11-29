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
        Schema::create('folders', function (Blueprint $table) {
            $table->increments('FolderId');
            $table->char('FolderName', 20);
            $table->integer('EmpId')->unsigned();
            $table->foreign('EmpId')->references('EmpId')->on('employees')->onDelete('cascade');
            $table->char('AccessType', 5)->nullable(true);
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
        Schema::dropIfExists('folders');
    }
};
