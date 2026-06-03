<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PriceRuleTypeSeeder::class,
            PriceRuleSeeder::class,
            PriceRuleTargetSeeder::class,
            PriceRuleConditionSeeder::class,
            PriceRuleActionSeeder::class,
            PriceRuleCouponSeeder::class,
            PriceRuleScheduleSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
