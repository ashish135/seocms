<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Project')->nullable();
            $table->string('Region')->nullable();
            $table->string('Main_Category')->nullable();
            $table->string('Sub_Category')->nullable();
            $table->string('Keyword')->nullable();
            $table->string('Activity_Type')->nullable();
            $table->string('Location')->nullable();
            $table->string('Targeted_URL')->nullable();
            $table->string('URL_After_Submission')->nullable();
            $table->string('DA')->nullable();
            $table->string('PA')->nullable();
            $table->string('SS')->nullable();
            $table->string('Username')->nullable();
            $table->string('Password')->nullable();
            $table->string('Email')->nullable();
            $table->string('Status')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
