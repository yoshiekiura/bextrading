<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //TODO: esto es para hacer dentro del tiempo establecido.
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->date('entrydate')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('fee_id')->unsigned()->nullable();
            $table->integer('month_id')->unsigned()->nullable();
            $table->integer('year_id')->unsigned()->nullable();
//            $table->integer('status_id')->unsigned()->nullable();
            //=============================
            $table->string('action')->nullable();
            $table->double('qty')->nullable();
            $table->string('type')->nullable(); //Call or Put
            $table->date('expdate')->nullable();
            $table->double('strike', 10, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
//            $table->decimal('buyfee', 10, 2)->nullable();
            $table->double('total', 10, 4)->nullable();
            $table->string('status', 10)->nullable();

            //==============================
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('month_id')->references('id')->on('months')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('year_id')->references('id')->on('years')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('fee_id')->references('id')->on('fees')
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
        Schema::dropIfExists('tickets');
    }
}
