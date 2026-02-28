<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('payment_methods')->insert([
            [
                'type' => 'bkash',
                'icon_image' => null, // Will use existing img/bkash.png from public folder
                'account_name' => 'CDDF Bangladesh',
                'account_number' => '+8801825-003211',
                'bank_details' => null,
                'is_active' => true,
                'display_order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type' => 'nagad',
                'icon_image' => null, // Will use existing img/nagad.png from public folder
                'account_name' => 'CDDF Bangladesh',
                'account_number' => '+8801825-003211',
                'bank_details' => null,
                'is_active' => true,
                'display_order' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type' => 'rocket',
                'icon_image' => null, // Will use existing img/rocket.png from public folder
                'account_name' => 'CDDF Bangladesh',
                'account_number' => '+8801825-003211',
                'bank_details' => null,
                'is_active' => true,
                'display_order' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type' => 'upay',
                'icon_image' => null, // Will use existing img/upay.png from public folder
                'account_name' => 'CDDF Bangladesh',
                'account_number' => '+8801825-003211',
                'bank_details' => null,
                'is_active' => true,
                'display_order' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type' => 'bank',
                'icon_image' => null,
                'account_name' => 'CDDF Bangladesh',
                'account_number' => '2050 2250 2050 XXXX',
                'bank_details' => json_encode([
                    'bank_name' => 'Islami Bank Bangladesh Limited (IBBL)',
                    'branch_name' => 'Maijdee Court, Maijdee, Noakhali Sadar, Noakhali, Bangladesh',
                    'routing_number' => '125260674',
                ]),
                'is_active' => true,
                'display_order' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
