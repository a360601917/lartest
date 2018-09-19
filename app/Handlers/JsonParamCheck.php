<?php

namespace App\Handlers;

class JsonParamCheck {
  public $error;

  public function check($json,$model,$key, $json_key) {
    $carts = json_decode($json, 1);
    $goods_ids = array_column($carts, $json_key);
    if (!$goods_ids) {
      $this->error='没有找到数据';
      return FALSE;
    }
    $goodss = $model::whereIn($key, $goods_ids)->get();
    $goodss_array=$goodss->toArray();
    if (count($goodss_array) != count($goods_ids)) {
      $diff = array_diff($goods_ids, array_column($goodss_array, $key));
      $this->error=implode(',', $diff).' '.$json_key.'不存在';
      return FALSE;
    }
    return $goodss;
  }

}
