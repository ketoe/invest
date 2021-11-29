<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('number');
            $table->year('year');
            $table->unsignedBigInteger('client_id'); //kontrahent (id)
            $table->double('value'); //wartość zlecenia
            $table->unsignedBigInteger('currency_id'); //waluta (po id)
            $table->string('placeMonter'); //miejsce montażu
            $table->unsignedBigInteger('vat_id'); //VAT (po id)
            $table->string('description'); //opis
            $table->unsignedBigInteger('status_id'); //status zlecenia
            $table->integer('archive')->default(0); //zlecenie w archiwum
            $table->integer('monter')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
