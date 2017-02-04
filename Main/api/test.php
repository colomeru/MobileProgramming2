<?php
//----------------------------
//データ準備
//----------------------------
	
require('SaveDataClass.php');
$data = new SaveDataClass();

//----------------------------
//JSON形式に変換
//----------------------------

$data->updateData($_REQUEST['id'], $_REQUEST['tile'], $_REQUEST['fish_sum']);
// データベースから全プレイヤーのデータを取得
$json = json_encode($data->getPlayerData());
// データの更新
$data->end();
//----------------------------
//クライアントに出力
//----------------------------
header('Access-Control-Allow-Origin: *');
print $json;

