<?php

namespace Database\Seeders;

use Artisan;
use DB;
use Illuminate\Database\Seeder;
use Log;
use Schema;
use Session;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(PortfolioSeeder::class);
    }
}
