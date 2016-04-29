<?php

use Illuminate\Database\Seeder;

class ParcelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parcel')->insert([
            'tracking_code' => '1234',
            'delivery_date' => date("Y-m-d H:i:s"),
        ]);
        DB::table('parcel')->insert([
            'tracking_code' => '5678',
            'delivery_date' => date("Y-m-d H:i:s"),
        ]);
    }
}
