<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
 
        Blade::if('profileSAdmin', function($user_profile){
            if($user_profile == '1'){
                return 1;
            } else{
                return 0;
            }
        });
    }

}
