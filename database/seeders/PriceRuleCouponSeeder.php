<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceRuleCouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('price_rule_coupons')->insert([
            [
                'price_rule_id' => 2,
                'code' => 'WELCOME20',
                'type' => 'shared',
                'is_active' => true,
                'usage_limit' => 1000,
                'usage_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
