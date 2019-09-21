<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Logo;
use App\Data;
use App\RedSocial;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $default   = Logo::where('type','default')->first();
        $favicon   = Logo::where('type','favicon')->first();
        $headband  = Logo::where('type','header')->first();
        $footband  = Logo::where('type','footer')->first();

        $location  = Data::where('type','address')->first();
        $phone     = Data::where('type','phone')->first();
        $email     = Data::where('type','email')->first();
        $website   = Data::where('type','website')->first();
        $whatsapp1 = Data::where('type','whatsapp1')->first();
        $whatsapp2 = Data::where('type','whatsapp2')->first();
        $info      = Data::where('type','info_contacto')->first();
        $map       = Data::where('type','info_google')->first();

        $redes     = RedSocial::orderBy('order')->get();

        view()->share([
        'default'   => $default,
        'favicon'   => $favicon,
        'headband'  => $headband,
        'footband'  => $footband,
        'location'  => $location,
        'phone'     => $phone,
        'email'     => $email,
        'website'   => $website,
        'whatsapp1' => $whatsapp1,
        'whatsapp2' => $whatsapp2,
        'info'      => $info,
        'map'       => $map,
        'redes'     => $redes,
        ]);
    }
}
