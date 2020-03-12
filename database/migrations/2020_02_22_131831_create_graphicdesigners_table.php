<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraphicdesignersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphicdesigners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('AssignDate')->nullable();
            $table->string('Assign_To')->nullable();
            $table->string('TargetDate')->nullable();
            $table->string('Project')->nullable();
            $table->string('Content_Type')->nullable();
            $table->string('Topic')->nullable();
            $table->string('Primary_Keywords')->nullable();
            $table->string('Long_Tail_Keywords')->nullable();
            $table->string('LSI_Keywords')->nullable();
            $table->string('Keyword_Density')->nullable();
            $table->string('Word_Count')->nullable();
            $table->string('Reference')->nullable();
            $table->string('Remark')->nullable();
            $table->string('Required_By')->nullable();
            $table->string('Date_Of_Completion')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('graphicdesigners');
    }
}
