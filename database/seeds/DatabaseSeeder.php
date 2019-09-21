<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
        $this->call(ContentSeeder::class);
        $this->call(DataSeeder::class);
        $this->call(LogoSeeder::class);
        $this->call(MetadataSeeder::class);
        $this->call(RedSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(NovedadCategorySeeder::class);
        $this->call(NovedadArticleSeeder::class);
    }
}
