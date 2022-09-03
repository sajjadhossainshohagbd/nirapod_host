<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductActivationManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_activation_managers', function (Blueprint $table) {
            $table->id();
            $table->string('product_name',10000);
            $table->longText('url');
            $table->longText('purchase_code');
            $table->enum('status',[0,1])->default(1)->comment('0=ban,1=active');
            $table->enum('is_seen',[0,1])->default(0)->comment('0=No,1=Yes');
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
        Schema::dropIfExists('product_activation_managers');
    }
}
