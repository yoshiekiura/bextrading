<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('idn', 30)->nullable();
            $table->string('nacionalidad', 60)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('ocupacion', 100)->nullable();
            $table->string('civil', 20)->nullable();
            $table->string('patrimonio', 100)->nullable();
            $table->string('annual', 100)->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('origen_fondos', 50)->nullable();
            $table->string('residente', 5)->nullable();
            $table->string('objetivo', 20)->nullable();
            $table->string('beneficiary', 50)->nullable();
            $table->string('bank', 50)->nullable();
            $table->string('agente', 40)->nullable();

//            $table->text('declaratoria')->nullable();
//            $table->text('terms')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::update("ALTER TABLE users AUTO_INCREMENT = 376200;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
