<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('course_name');
            $table->bigInteger('num_of_course');
            $table->bigInteger('course_duration');
            $table->bigInteger('total_course_fee');
            $table->bigInteger('admission_fee');
            $table->bigInteger('paid_amount');
            $table->bigInteger('due_amount')->nullable();
            $table->bigInteger('discount_amount')->nullable();
            $table->bigInteger('sub_total');
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
        Schema::dropIfExists('admissions');
    }
}
