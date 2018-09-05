<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Goods::class, function (Faker $faker) {
  // 头像假数据
  $avatars = [
      'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png?imageView2/1/w/200/h/200',
      'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png?imageView2/1/w/200/h/200',
      'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png?imageView2/1/w/200/h/200',
      'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png?imageView2/1/w/200/h/200',
      'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200',
      'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png?imageView2/1/w/200/h/200',
  ];
  return [
      'sku' => $faker->unique()->ean8,
      'category_id' => mt_rand(1, 5),
      'category_child_id' => mt_rand(6, 10),
      'title' => $faker->name,
      'etitle' => $faker->catchPhrase,
      'image'=> $avatars[array_rand($avatars)],
      'price'=>$faker->randomFloat(2, 10, 100),
      'describe'=>$faker->text(),
      'sort'=>$faker->numberBetween(1, 500),
  ];
});
