<?php

use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contents')->insert(array (
            0 => array (
                'id'            => 1,
                'section'       => 'home',
                'order'         => 'AA',
                'type'          => '1i-1t',
                'title_es'      => 'ALTA CALIDAD',
                'image1'        => 'icon1.png',
                'subtitle_es'   => '',
                'text_es'       => '',
                'image2'        => '',
                'image3'        => '',
            ),
            1 => array (
                'id'            => 2,
                'section'       => 'home',
                'order'         => 'BB',
                'type'          => '1i-1t',
                'title_es'      => 'AMPLIA GAMA DE MODELOS',
                'image1'        => 'icon2.png',
                'subtitle_es'   => '',
                'text_es'       => '',
                'image2'        => '',
                'image3'        => '',
            ),
            2 => array (
                'id'            => 3,
                'section'       => 'home',
                'order'         => 'CC',
                'type'          => '1i-1t',
                'title_es'      => 'MÁS DE 40 AÑOS DE TRAYECTORIA',
                'image1'        => 'icon3.png',
                'subtitle_es'   => '',
                'text_es'       => '',
                'image2'        => '',
                'image3'        => '',
            ),
            3 => array (
                'id'            => 4,
                'section'       => 'home',
                'order'         => 'DD',
                'type'          => '1i-1t',
                'title_es'      => 'TECNOLOGÍA AVANZADA',
                'image1'        => 'icon4.png',
                'subtitle_es'   => '',
                'text_es'       => '',
                'image2'        => '',
                'image3'        => '',
            ),
            4 => array (
                'id'            => 5,
                'order'         => '',
                'section'       => 'empresa',
                'type'          => '1i-1c',
                'title_es'      => '',
                'image1'        => 'empresa.jpg',
                'subtitle_es'   => '',
                'text_es'       => '<p><span style="font-size:14px"><strong>LUBER</strong>es una pujante Empresa Argentina, que comercializa Cerraduras El&eacute;ctricas y Cerrojos de Seguridad de muy alta calidad y una importante gama de modelos.</span></p><p><span style="font-size:14px">LUBER da comienzo a su actividad en el a&ntilde;o 1980, especializ&aacute;ndose en la fabricaci&oacute;n de destrabadores el&eacute;ctricos, siendo esta una peque&ntilde;a empresa familiar. A medida que transcurrieron los a&ntilde;os, nos fuimos renovando en cuanto a la incorporaci&oacute;n de una importante gama de productos como los cerrojos, picaportes para puertas blindex y cerraduras, acorde a las distintas necesidades.</span></p>',
                'image2'        => '',
                'image3'        => '',
            ),
        ));
    }
}
