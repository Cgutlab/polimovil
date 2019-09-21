<?php

use Illuminate\Database\Seeder;

class ProductoFamiliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('producto_familias')->insert(array (
            0 => array (
              'id'        => 0,
              'image'     => '',
              'title_es'  => 'CATEGORIA PRINCIPAL',
              'order'     => 'A',
              'level'     => '0',
              'family_id' => '',
            ),
        ));
    }

}
