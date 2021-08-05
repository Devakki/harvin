<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat1 = BlogCategory::create([
            'name' => 'Sustainable Future', 
        ]);

        $cat2 = BlogCategory::create([
            'name' => 'Client Story', 
        ]);

        $cat3 = BlogCategory::create([
            'name' => 'Article', 
        ]);
    }
}
