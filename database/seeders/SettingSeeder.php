<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title' => 'فروشگاه من',
            'description' => 'توضیحات فروشگاه من',
            'keywords' => 'کلمات کلیدی فروشگاه من',
            'logo' => 'logo.png',
            'icon' => 'icon.png'
        ]);
    }
}
