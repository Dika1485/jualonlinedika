<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Pembayaran;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 50; $i++) {
	        Pembayaran::insert([
	        	'method'=>$faker->name(),
	        	'status'=>$faker->randomElement(['settlement','waiting']),
        		'total'=> $faker->randomDigitNotNull()*5000,
        		'sum'=> $faker->randomDigitNotNull(),
        		'customer_id'=> $faker->numberBetween(1,10),
	        ]);
        }
    }
}
