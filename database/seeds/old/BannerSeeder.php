<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('banners')->insert(array (
            0 =>
            array (
                'id'          => 1,
                'section'     => 'home',
                'type'        => 'left',
                'order'       => 'AA',
                'image'       => 'banner1.jpg',
                'title_es'    => 'Solicite un presupuesto',
                'subtitle_es' => 'Fácil, rápido y online',
                'button_es'   => 'Enviar',
                'route'       => 'solicitar-presupuesto',
            ),
        ));
    }
}
