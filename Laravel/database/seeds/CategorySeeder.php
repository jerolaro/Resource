<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$categories = [
            ['name' => 'Politics',],
            ['name' => "Tools",],
            ['name' => "Tech",],
            ['name' => "Digital Arts",],
            ['name' => "Games",],
            ['name' => "Music",],
            ['name' => "Publishing",],
            ['name' => "Film & Video",],
            ['name' => "Customer Product",],
            ['name' => "Service",],
            ['name' => "Other",],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $this->call(CategorySeeder::class);*/
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
