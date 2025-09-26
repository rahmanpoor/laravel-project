<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Footer\FooterSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FooterSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
   {
        FooterSetting::firstOrCreate(
            ['id' => 1], // شرط یکتا (فقط یک رکورد داشته باشیم)
            [
                'copyright' => '© ' . date('Y') . ' فروشگاه من',
                // اینجا هر فیلد دیگه‌ای که داری مقدار پیش‌فرض بده
            ]
        );
    }
}
