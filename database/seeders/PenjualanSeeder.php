<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penjualan')->insert([
            ['transaction_number' => 'TRX001', 'marketing_id' => 1, 'date' => '2023-05-22', 'cargo_fee' => 25000, 'total_balance' => 3000000, 'grand_total' => 3025000],
            ['transaction_number' => 'TRX002', 'marketing_id' => 3, 'date' => '2023-05-22', 'cargo_fee' => 25000, 'total_balance' => 320000, 'grand_total' => 345000],
        ]);
    
    }
}
