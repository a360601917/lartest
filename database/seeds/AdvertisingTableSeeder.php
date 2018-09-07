<?php

use Illuminate\Database\Seeder;
use App\Models\Advertising;

class AdvertisingTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $advertisings= factory(Advertising::class)->times(4)->make();
    Advertising::insert($advertisings->toArray());
  }

}
