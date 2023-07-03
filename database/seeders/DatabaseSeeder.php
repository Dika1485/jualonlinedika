<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user=new UserSeeder();
        $user->run();
        $produk=new ProdukSeeder();
        $produk->run();
        $pembayaran=new PembayaranSeeder();
        $pembayaran->run();
        $pesanan=new PesananSeeder();
        $pesanan->run();
        // UserSeeder::run();
        // ProdukSeeder::run();
        // PesananSeeder::run();
        // PembayaranSeeder::run();
    }
}
