<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 100; $i++) {
	        Produk::insert([
	        	'name'=>$faker->name(),
	        	'owner_id'=>$faker->numberBetween(1,10),
        		'price'=> $faker->randomDigitNotNull()*1000,
	        ]);
        }
    }
}
