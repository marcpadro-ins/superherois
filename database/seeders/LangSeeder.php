<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lang;

class LangSeeder extends Seeder
{
    public function run(): void
    {
        $langs = [
            ['code' => 'en', 'name' => 'Anglès'],
            ['code' => 'ca', 'name' => 'Català'],
            ['code' => 'es', 'name' => 'Espanyol'],
            ['code' => 'fr', 'name' => 'Francès'],
            ['code' => 'de', 'name' => 'Alemany'],
            ['code' => 'zh', 'name' => 'Xinès'],
            ['code' => 'pt', 'name' => 'Portuguès'],
            ['code' => 'it', 'name' => 'Italià'],
            ['code' => 'nl', 'name' => 'Neerlandès'],
            ['code' => 'ru', 'name' => 'Rus'],
            ['code' => 'ja', 'name' => 'Japonès'],
        ];

        foreach ($langs as $lang) {
            Lang::create([
                'code' => $lang['code'],
                'name' => $lang['name'],
            ]);
        }
    }
}

