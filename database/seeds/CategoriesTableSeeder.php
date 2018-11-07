<?php

use Illuminate\Database\Seeder;
use Tradesys\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category              = new Category();
        $category->name        = 'Options';
        $category->description = 'Option Contract from commodities';
        $category->save();

        $category              = new Category();
        $category->name        = 'Crypto Currency';
        $category->description = 'All Crypto Currency Market';
        $category->save();

        $category              = new Category();
        $category->name        = 'Hedge Fund';
        $category->description = 'All types of hedges';
        $category->save();
    }
}
