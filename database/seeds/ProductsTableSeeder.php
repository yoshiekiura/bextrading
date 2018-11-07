<?php

use Tradesys\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Gold';
        $product->symbol ='GC';
        $product->leverage = 100;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Silver';
        $product->symbol ='SI';
        $product->leverage = 5000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Palladium';
        $product->symbol ='PA';
        $product->leverage = 100;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Platinium';
        $product->symbol ='PL';
        $product->leverage = 50;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Crude Oil';
        $product->symbol ='CL';
        $product->leverage = 1000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Gasoline';
        $product->symbol ='RBOB';
        $product->leverage = 42000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Cotton #2';
        $product->symbol ='CT';
        $product->leverage = 5000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Heating Oil';
        $product->symbol ='HO';
        $product->leverage = 42000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Natural Gas';
        $product->symbol ='NG';
        $product->leverage = 10000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Dollar Index';
        $product->symbol ='DX';
        $product->leverage = 1000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Euro';
        $product->symbol ='E6';
        $product->leverage = 125000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Yen';
        $product->symbol ='JY';
        $product->leverage = 125000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Australian Dollar';
        $product->symbol ='A6';
        $product->leverage = 100000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'British Pound';
        $product->symbol ='B6';
        $product->leverage = 62500;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Mexican Peso';
        $product->symbol ='M6';
        $product->leverage = 500000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'New Zealand Dollar';
        $product->symbol ='N6';
        $product->leverage = 100000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Russian Ruble';
        $product->symbol ='R6';
        $product->leverage = 500000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Swiss Franc';
        $product->symbol ='S6';
        $product->leverage = 125000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'E-Mini S$P 500';
        $product->symbol ='ES';
        $product->leverage = 50;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'E-Mini S$P MIdcap';
        $product->symbol ='EW';
        $product->leverage = 100;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Euro Dollar';
        $product->symbol ='GE';
        $product->leverage = 2500;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Mini Contract USD';
        $product->symbol ='MDX';
        $product->leverage = 2.5;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'E-Mini Nasdaq 100';
        $product->symbol ='NQ';
        $product->leverage = 20;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Rusell 2000 Mini';
        $product->symbol ='RJ';
        $product->leverage = 100;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = '10 Year- Tnote';
        $product->symbol ='ZN';
        $product->leverage = 1000;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Live Cattle';
        $product->symbol ='LE';
        $product->leverage = 400;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Feeder Cattle';
        $product->symbol ='GF';
        $product->leverage = 500;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Lumber';
        $product->symbol ='LS';
        $product->leverage = 110;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Lean Hogs';
        $product->symbol ='LH';
        $product->leverage = 400;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Sprinh Weat';
        $product->symbol ='MW';
        $product->leverage = 50;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Corn';
        $product->symbol ='ZC';
        $product->leverage = 50;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Soybean Meal';
        $product->symbol ='ZM';
        $product->leverage = 100;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Soybean Oil';
        $product->symbol ='ZL';
        $product->leverage = 600;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Orange Juice';
        $product->symbol ='OJ';
        $product->leverage = 150;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Cocoa';
        $product->symbol ='CC';
        $product->leverage = 10;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Cotton#2';
        $product->symbol ='CT';
        $product->leverage = 2/500;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Coffee';
        $product->symbol ='KC';
        $product->leverage = 375;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Sugar#11';
        $product->symbol ='SB';
        $product->leverage = 1120;
        $product->save();

        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Canola Oil';
        $product->symbol ='RS';
        $product->leverage = 20;
        $product->save();

        $product = new Product();
        $product->category_id = 2;
        $product->name = 'Bitcoin';
        $product->symbol ='BTC';
        $product->leverage = 5;
        $product->save();

        $product = new Product();
        $product->category_id = 2;
        $product->name = 'Ethereum';
        $product->symbol ='ETH';
        $product->leverage = 5;
        $product->save();

        $product = new Product();
        $product->category_id = 2;
        $product->name = 'Ripple';
        $product->symbol ='XRP';
        $product->leverage = 5;
        $product->save();

        $product = new Product();
        $product->category_id = 2;
        $product->name = 'Bitcoin Cash';
        $product->symbol ='BTH';
        $product->leverage = 5;
        $product->save();

        $product = new Product();
        $product->category_id = 2;
        $product->name = 'Litecoin';
        $product->symbol ='LTC';
        $product->leverage = 5;
        $product->save();

        $product = new Product();
        $product->category_id = 2;
        $product->name = 'Cardano';
        $product->symbol ='ADA';
        $product->leverage = 5;
        $product->save();

        $product = new Product();
        $product->category_id = 2;
        $product->name = 'Monero';
        $product->symbol ='XMR';
        $product->leverage = 5;
        $product->save();

        $product = new Product();
        $product->category_id = 2;
        $product->name = 'Dash';
        $product->symbol ='DASH';
        $product->leverage = 5;
        $product->save();

        $product = new Product();
        $product->category_id = 2;
        $product->name = 'Ethereum Classic';
        $product->symbol ='ETC';
        $product->leverage = 5;
        $product->save();
    }
}
