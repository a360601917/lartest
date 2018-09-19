<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    \Illuminate\Support\Facades\Schema::defaultStringLength(190);
    \App\Models\Order::observe(\App\Observers\OrderObserver::class);
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    //
  }

}
