<?php

use Illuminate\Database\Seeder;

class MetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('metadata')->insert(array (
            0 => array (
              'id'             => 1,
              'section'        => 'home',
              'keyword_es'     => 'Palabras Clave',
              'description_es' => 'Descripcion Para la búsqueda avanzada',
            ),
            1 => array (
              'id'             => 2,
              'section'        => 'empresa',
              'keyword_es'     => 'Palabras Clave',
              'description_es' => 'Descripcion Para la búsqueda avanzada',
            ),
            2 => array (
              'id'             => 3,
              'section'        => 'productos',
              'keyword_es'     => 'Palabras Clave',
              'description_es' => 'Descripcion Para la búsqueda avanzada',
            ),
            3 => array (
              'id'             => 4,
              'section'        => 'distribuidores',
              'keyword_es'     => 'Palabras Clave',
              'description_es' => 'Descripcion Para la búsqueda avanzada',
            ),
            4 => array (
              'id'             => 5,
              'section'        => 'novedades',
              'keyword_es'     => 'Palabras Clave',
              'description_es' => 'Descripcion Para la búsqueda avanzada',
            ),
            5 => array (
              'id'             => 6,
              'section'        => 'contacto',
              'keyword_es'     => 'Palabras Clave',
              'description_es' => 'Descripcion Para la búsqueda avanzada',
            ),
        ));
    }
}
