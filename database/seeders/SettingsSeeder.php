<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'key' => 'header_menu',
                'value' => 'Blog',
                'optional' => '#'
            ],
            [
                'key' => 'header_menu',
                'value' => 'Support',
                'optional' => '#'
            ],
            [
                'key' => 'header_menu',
                'value' => 'Login',
                'optional' => '#'
            ],
        ];

        Settings::insert($array);
    }
}
