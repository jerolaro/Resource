<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(SponsorSeeder::class);
    }
}
