<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Pesanan;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 50; $i++) {
	        Pesanan::insert([
	        	'paying_id'=>$i,
	        	'product_id'=>$faker->numberBetween(1,100),
	        ]);
        }
    }
}
