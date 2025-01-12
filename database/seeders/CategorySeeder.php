<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Lang;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Spiderman'],
            ['name' => 'Ironman'],
            ['name' => 'Hulk'],
            ['name' => 'Thor'],
            ['name' => 'Captain America'],
            ['name' => 'Black Widow'],
            ['name' => 'Black Panther'],
            ['name' => 'Doctor Strange'],
            ['name' => 'Antman'],
            ['name' => 'Wolverine'],
            ['name' => 'Deadpool'],
            ['name' => 'Thanos'],
            ['name' => 'Venom'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
            ]);
        }

        $lang = Lang::where('code', 'en')->first();
        $categories = Category::all();
        foreach ($categories as $category) {
            $category->langs()->attach($lang, ['name' => $category->name ,'created_at' => now(), 'updated_at' => now()]);
        }
    }
}

