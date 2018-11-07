<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->increments('id');

            $table->date('entry');
            $table->integer('user_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('action',100)->nullable();
            $table->decimal('amount',10,2)->nullable();
            $table->string('description')->nullable();
            $table->double('rate')->nullable();
            $table->decimal('fee')->nullable();
            $table->double('qty')->nullable();
            $table->double('total')->nullable();
            $table->string('status',25)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('product_id')->references('id')->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
