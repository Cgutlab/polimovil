<?php

use Illuminate\Database\Seeder;

class DestacadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('destacados')->insert(array (
            0 => array (
              'id'          => 1,
              'image'       => 'd1.jpg',
              'title'       => 'Máquinas',
              'order'       => 'AA',
            ),
            1 => array (
              'id'          => 2,
              'image'       => 'd2.jpg',
              'title'       => 'Soluciones a medida',
              'order'       => 'BB',
            ),
        ));
    }
}
