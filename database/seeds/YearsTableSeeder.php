<?php

use Illuminate\Database\Seeder;
use Tradesys\Year;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year       = new Year();
        $year->year = 18;
        $year->save();

        $year       = new Year();
        $year->year = 19;
        $year->save();

        $year       = new Year();
        $year->year = 20;
        $year->save();

        $year       = new Year();
        $year->year = 21;
        $year->save();

        $year       = new Year();
        $year->year = 22;
        $year->save();

        $year       = new Year();
        $year->year = 23;
        $year->save();

        $year       = new Year();
        $year->year = 24;
        $year->save();

        $year       = new Year();
        $year->year = 25;
        $year->save();
    }
}
