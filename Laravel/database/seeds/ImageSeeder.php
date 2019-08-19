<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Image::class, 250)->create();
        factory(App\Models\Image_projects::class, 250)->create();
    }
}
