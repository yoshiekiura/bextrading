<?php

use Tradesys\Month;
use Illuminate\Database\Seeder;

class MonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $month = new Month();
        $month->month = 'January';
        $month->code = 'F';
        $month->save();
        $month = new Month();
        $month->month = 'February';
        $month->code = 'G';
        $month->save();
        $month = new Month();
        $month->month = 'March';
        $month->code = 'H';
        $month->save();
        $month = new Month();
        $month->month = 'April';
        $month->code = 'J';
        $month->save();
        $month = new Month();
        $month->month = 'May';
        $month->code = 'K';
        $month->save();
        $month = new Month();
        $month->month = 'June';
        $month->code = 'M';
        $month->save();
        $month = new Month();
        $month->month = 'July';
        $month->code = 'N';
        $month->save();
        $month = new Month();
        $month->month = 'August';
        $month->code = 'Q';
        $month->save();
        $month = new Month();
        $month->month = 'September';
        $month->code = 'U';
        $month->save();
        $month = new Month();
        $month->month = 'Octuber';
        $month->code = 'V';
        $month->save();
        $month = new Month();
        $month->month = 'November';
        $month->code = 'X';
        $month->save();
        $month = new Month();
        $month->month = 'December';
        $month->code = 'Z';
        $month->save();

    }
}
