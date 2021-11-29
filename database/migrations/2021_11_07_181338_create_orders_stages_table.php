<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_stages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->string('name');
            $table->string('description');
            $table->integer('week_start');
            $table->year('year_start');
            $table->integer('week_end');
            $table->year('year_end');
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
        Schema::dropIfExists('orders_stages');
    }
}
