<?php

use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('logos')->insert(array (
            0 => array (
                'id'    => 1,
                'type'  => 'header',
                'image' => 'header.png',
            ),
            1 => array (
                'id'    => 2,
                'type'  => 'footer',
                'image' => 'footer.png',
            ),
            2 => array (
                'id'    => 3,
                'type'  => 'favicon',
                'image' => 'favicon.png',
            ),
            3 => array (
                'id'    => 4,
                'type'  => 'default',
                'image' => 'default.png',
            ),
        ));
    }
}
