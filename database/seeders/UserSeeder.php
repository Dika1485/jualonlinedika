<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name'=>'imnotdika',
            'email'=>'ptiandika@gmail.com',
            'password' => Hash::make('imnotdika++'),
        ]);
        $faker = Faker::create('id_ID');
        for ($i=2; $i <= 10; $i++) {
	        User::insert([
	        	'name'=>$faker->name(),
	        	'email'=>$faker->email(),
	        	'password' => Hash::make('user12345'),
	        ]);
        }
    }
}
