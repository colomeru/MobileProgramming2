<?php
//----------------------------
//データ準備
//----------------------------

const FIELD_COLUMN = 9;       //横のマス目
const FIELD_ROW    = 9;       //縦のマス目

$data = [
	  ['name'=>'Dragon', 'rare'=>'SR']
	, ['name'=>'Slime',  'rare'=>'N']
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

