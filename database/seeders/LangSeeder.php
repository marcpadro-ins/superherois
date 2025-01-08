<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lang;

class LangSeeder extends Seeder
{
    public function run(): void
    {
        // $langs = [
        //     ['code' => 'en', 'name' => 'English'],
        //     ['code' => 'ca', 'name' => 'Catalan'],
        //     ['code' => 'es', 'name' => 'Spanish'],
        //     ['code' => 'fr', 'name' => 'French'],
        //     ['code' => 'de', 'name' => 'German'],
        //     ['code' => 'zh', 'name' => 'Chinese'],
        //     ['code' => 'pt', 'name' => 'Portuguese'],
        //     ['code' => 'it', 'name' => 'Italian'],
        //     ['code' => 'nl', 'name' => 'Dutch'],
        //     ['code' => 'ru', 'name' => 'Russian'],
        //     ['code' => 'ja', 'name' => 'Japanese'],
        // ];

        // foreach ($langs as $lang) {
        //     Lang::create($lang);
        // }

        $langs = [
            ['code' => 'en', 'name' => 'English'],
            ['code' => 'es', 'name' => 'Spanish'],
            ['code' => 'fr', 'name' => 'French'],
            ['code' => 'de', 'name' => 'German'],
            ['code' => 'it', 'name' => 'Italian'],
            ['code' => 'pt', 'name' => 'Portuguese'],
            ['code' => 'ru', 'name' => 'Russian'],
            ['code' => 'zh', 'name' => 'Chinese'],
        ];

        foreach ($langs as $lang) {
            Lang::create([
                'code' => $lang['code'],
                'name' => $lang['name'],
            ]);
        }
    }
}

