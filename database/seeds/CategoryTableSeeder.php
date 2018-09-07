<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $faker = app(Faker\Generator::class);
    $categorys=factory(Category::class)->times(10)->make()->each(function($category, $index) use ($faker) {
      $category->pid=0;
      if($index>4){
        $category->pid=$faker->numberBetween(1, 5);
      }
    });
    Category::insert($categorys->toArray());
  }

}
