<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('meeting_with');
            $table->foreignId('category_id')->nullable();
            $table->string('name');
            $table->string('for_whom');
            $table->string('which_course');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('profession')->nullable();
            $table->string('institution')->nullable();
            $table->string('approximate_age')->nullable();
            $table->string('address')->nullable();
            $table->longText('additional')->nullable();
            $table->date('reminder_date')->nullable();
            $table->string('reminder_time')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('information');
    }
}
