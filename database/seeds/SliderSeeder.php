<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sliders')->insert(array (
            0 => array (
              'id'          => 1,
              'image'       => 's1.jpg',
              'order'       => 'AA',
              'section'     => 'home',
              'type'        => '1i-1t',
              'title_es'    => '',
              'text_es'     => '<p>CERRADURAS ELECTRICAS Y CERROJOS DE SEGURIDAD</p>',
              'subtitle_es' => '',
            ),
            1 => array (
              'id'          => 2,
              'image'       => 's2.jpg',
              'order'       => 'AA',
              'section'     => 'empresa',
              'type'        => '1i-1t',
              'title_es'    => '',
              'text_es'     => '<p>A disposición de nuestros clientes todo nuestro conocimiento y la gran vocación de atención y servicio que nos caracteriza como empresa familiar.</p>',
              'subtitle_es' => '',
            ),
        ));
    }
}
