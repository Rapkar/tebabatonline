<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'total_amount' => '12000000',
            'status' => '',
            'payment_method' => 'direct',
            'shipping_address' => '',
            'user_id'=>2,
        ]);
        Order::create([
            'total_amount' => '12000000',
            'status' => '',
            'payment_method' => 'onlnie',
            'shipping_address' => '',
            'user_id'=>2,
        ]);


    }
}
