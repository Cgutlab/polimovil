<?php

use Illuminate\Database\Seeder;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('icons')->insert(array (
            0 => array (
                'id'       => 1,
                'section'  => 'home',
                'image'    => 'i1.jpg',
                'title_es' => 'Conocimiento técnico especializado',
                'order'    => 'AA',
            ),
            1 => array (
                'id'       => 2,
                'section'  => 'home',
                'image'    => 'i2.jpg',
                'title_es' => 'Confiabilidad, precisión y respaldo técnico',
                'order'    => 'BB',
            ),
            2 => array (
                'id'       => 3,
                'section'  => 'home',
                'image'    => 'i3.jpg',
                'title_es' => 'Velocidad de respuesta y capacidad de innovación',
                'order'    => 'CC',
            ),
            3 => array (
                'id'       => 4,
                'section'  => 'home',
                'image'    => 'i4.jpg',
                'title_es' => 'Relación entre el valor del producto y su calidad',
                'order'    => 'DD',
            ),
            4 => array (
                'id'       => 5,
                'section'  => 'servicio',
                'image'    => 'i5.png',
                'title_es' => 'Atención personalizada',
                'order'    => 'AA',
            ),
            5 => array (
                'id'       => 6,
                'section'  => 'servicio',
                'image'    => 'i6.png',
                'title_es' => 'Respuesta inmediata',
                'order'    => 'BB',
            ),
            6 => array (
                'id'       => 7,
                'section'  => 'servicio',
                'image'    => 'i7.png',
                'title_es' => 'Asistencia 24 hs.',
                'order'    => 'CC',
            ),
        ));
    }
}
