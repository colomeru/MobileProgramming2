<?php
//----------------------------
//データ準備
//----------------------------
$data = [
      ['name'=>'Dragon', 'rare'=>'SR'],
      ['name'=>'Slime', 'rare'=>'N']
];
//----------------------------
//JSON形式に変換
//----------------------------
$json = json_encode($data);
//----------------------------
//クライアントに出力
//----------------------------
header('Access-Control-Allow-Origin: *');
print $json;
