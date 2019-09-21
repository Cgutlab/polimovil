<?php

use Illuminate\Database\Seeder;

class RedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('reds')->insert(array (
            0 => array (
              'id'       => 1,
              'image'    => 'facebook.png',
              'route'    => 'https://www.facebook.com/',
              'order'    => 'AA',
            ),
            1 => array (
                'id'       => 2,
                'image'    => 'instagram.png',
                'route'    => 'https://www.instagram.com/?hl=es-la',
                'order'    => 'BB',
              ),
        ));
    }

}
