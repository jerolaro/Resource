<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorSeeder extends Seeder
{
    public function run()
    {
        factory(App\Sponsor::class, 120)->create();
    }
}