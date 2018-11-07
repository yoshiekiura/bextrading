<?php

use Tradesys\Fee;
use Illuminate\Database\Seeder;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fee = new Fee();
        $fee->amount = 0;
        $fee->porcentaje = 1;
        $fee->save();

        $fee = new Fee();
        $fee->amount = 10;
        $fee->porcentaje = 2;
        $fee->save();

        $fee = new Fee();
        $fee->amount = 15;
        $fee->porcentaje = 3;
        $fee->save();

        $fee = new Fee();
        $fee->amount = 20;
        $fee->porcentaje = 4;
        $fee->save();

        $fee = new Fee();
        $fee->amount = 25;
        $fee->porcentaje = 5;
        $fee->save();
    }
}
