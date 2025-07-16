<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Luxury Bracelets' => [
                'en' => ['title' => 'Luxury Bracelets', 'description' => ''],
                'cn' => ['title' => '奢华手链', 'description' => ''],
                'id' => ['title' => 'Gelang Mewah', 'description' => ''],
            ],
            'Luxury Necklace' => [
                'en' => ['title' => 'Luxury Necklace', 'description' => ''],
                'cn' => ['title' => '奢华项链', 'description' => ''],
                'id' => ['title' => 'Kalung Mewah', 'description' => ''],
            ],
            'Luxury Earrings' => [
                'en' => ['title' => 'Luxury Earrings', 'description' => ''],
                'cn' => ['title' => '奢华耳环', 'description' => ''],
                'id' => ['title' => 'Anting Mewah', 'description' => ''],
            ],
        ];

        foreach ($categories as $key => $translations) {
            $category = Category::firstOrCreate([
                'slug' => Str::slug($key),
            ]);
            foreach ($translations as $locale => $translation) {
                $category->translateOrNew($locale)->name = $translation['title'];
                $category->translateOrNew($locale)->description = $translation['description'];
            }
            $category->save();
        }
    }
}
