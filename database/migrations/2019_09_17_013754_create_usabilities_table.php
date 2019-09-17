<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usabilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',60);
            $table->string('email',100);
            $table->string('phone',60);
            $table->string('r_phone_call',5);
            $table->string('website');
            $table->string('priority',50);
            $table->string('type',50);
            $table->string('message');
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
        Schema::dropIfExists('usabilities');
    }
}
