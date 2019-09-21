<?php

use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('data')->insert(array (
            0 => array (
              'id'    => 1,
              'type'  => 'address',
              'text'  => 'Maestra Gachet 3677/79 - CP 1712 - Castelar - Buenos Aires - Argentina',
              'route' => 'Maestra Gachet 3677/79 - CP 1712 - Castelar - Buenos Aires - Argentina',
            ),
            1 => array (
              'id'    => 2,
              'type'  => 'phone',
              'text'  => 'Tel. /Fax. (+54 11) 4692-3950 / (+54 11) 4692-5107',
              'route' => '541146923950',
            ),
            2 => array (
              'id'    => 3,
              'type'  => 'email',
              'text'  => 'info@lubercerraduras.com.ar',
              'route' => 'info@lubercerraduras.com.ar',
            ),
            3 => array (
              'id'    => 4,
              'type'  => 'website',
              'text'  => 'www.lubercerraduras.com.ar',
              'route' => 'www.lubercerraduras.com.ar',
            ),
            4 => array (
              'id'    => 5,
              'type'  => 'whatsapp1',
              'text'  => '(011) 15 3231-1627',
              'route' => '0111532311627',
            ),
            5 => array (
              'id'    => 6,
              'type'  => 'whatsapp2',
              'text'  => '(011) 15 3231-1627',
              'route' => '0111532311627',
            ),
            6 => array (
              'id'    => 7,
              'type'  => 'info_contacto',
              'text'  => 'Términos y condiciones de privacidad...',
              'route' => 'Términos y condiciones de privacidad...',
            ),
            7 => array (
              'id'    => 8,
              'type'  => 'info_google',
              'text'  => 'api-google',
              'route' => '#',
            ),
        ));
    }
}
