<?php

use Illuminate\Database\Seeder;

class NovedadArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('novedad_articulos')->insert(array (
            0 => array (
                'id'            => 1,
                'image'         => 'n1.jpg',
                'extract_es'    => 'Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero.',
                'title_es'      => 'Eventos',
                'subtitle_es'   => '',
                'text_es'       => '<p><strong>EXPOFERRETERA, La Exposición Internacional de Artículos para Ferreterías, Sanitarios, Pinturerías y Materiales de Construcción</strong></p><p>Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero. <br>Consolidada como el evento más relevante del sector en Sudamérica, ExpoFerretera se celebra cada dos años en Buenos Aires englobando a todo el mercado de la fabricación e importación de productos para la construcción y maquinarias de uso domiciliario o industrial. Bienalmente, refleja la situación actual de la industria, exhibe los principales avances tecnológicos e impulsa la capacitación.</p>',
                'novedad_id'    => '1',
            ),
            1 => array (
                'id'            => 2,
                'image'         => 'n2.jpg',
                'extract_es'    => 'Hemos actualizado nuestra sección de distribuidores para que encuentres todo lo que necesitás cerca tuyo.',
                'title_es'      => 'Eventos',
                'subtitle_es'   => '',
                'text_es'       => '',
                'novedad_id'    => '1',
            ),
            2 => array (
                'id'            => 3,
                'image'         => 'n3.jpg',
                'extract_es'    => 'Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero.',
                'title_es'      => 'Promociones',
                'subtitle_es'   => '',
                'text_es'       => '',
                'novedad_id'    => '2',
            ),
            3 => array (
                'id'            => 4,
                'image'         => 'n4.jpg',
                'extract_es'    => 'Hemos actualizado nuestra sección de distribuidores para que encuentres todo lo que necesitás cerca tuyo.',
                'title_es'      => 'Productos',
                'subtitle_es'   => '',
                'text_es'       => '',
                'novedad_id'    => '3',
            ),
        ));
    }
}
