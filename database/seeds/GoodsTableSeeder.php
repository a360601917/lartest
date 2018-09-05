<?php

use Illuminate\Database\Seeder;
use App\Models\Goods;

class GoodsTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $topics = factory(Goods::class)->times(100)->make();
    Goods::insert($topics->toArray());
  }

}
