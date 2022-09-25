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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->double('quiz_score');
            $table->string('quiz_score_grade', 1);

            $table->double('task_score');
            $table->string('task_score_grade', 1);

            $table->double('absent_score');
            $table->string('absent_score_grade', 1);

            $table->double('practice_score');
            $table->string('practice_score_grade', 1);

            $table->double('uas_score');
            $table->string('uas_score_grade', 1);

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
        Schema::dropIfExists('grades');
    }
};
