<?php

use Illuminate\Database\Seeder;

class NovedadCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('novedad_categorias')->insert(array (
            0 => array (
              'id'        => 1,
              'title_es'  => 'Eventos',
              'order'     => 'AA',
            ),
            1 => array (
              'id'        => 2,
              'title_es'  => 'Productos',
              'order'     => 'BB',
            ),
            2 => array (
              'id'        => 3,
              'title_es'  => 'Promociones',
              'order'     => 'CC',
            ),
        ));
    }
}
