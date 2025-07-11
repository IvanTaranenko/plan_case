<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'plan_name' => 'Basic',
                'price' => 10,
                'features' => json_encode([
                    'Storage' => '10GB',
                    'Users' => '1 User',
                ]),
            ],
            [
                'plan_name' => 'Standard',
                'price' => 25,
                'features' => json_encode([
                    'Storage' => '50GB',
                    'Support' => 'Email & Chat Support',
                    'Users' => 'Up to 5 Users',
                ]),
            ],
            [
                'plan_name' => 'Premium',
                'price' => 50,
                'features' => json_encode([
                    'Storage' => '200GB',
                    'Support' => 'Priority Support',
                    'Daily reports' => true,
                    'Users' => 'Unlimited Users',
                ]),
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
