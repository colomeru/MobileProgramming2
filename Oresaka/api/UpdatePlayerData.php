<?php
//----------------------------
//データ準備
//----------------------------
	
require('SaveDataClass.php');
require('MapDataClass.php');
$data = new SaveDataClass();
$map = new MapDataClass();

//----------------------------
//JSON形式に変換
//----------------------------

if($data->findPlayerData($_REQUEST['id'])['next_id'] === $_REQUEST['id']){
	$data->updateData($_REQUEST['id'], $_REQUEST['tile']);
}

$map->UpdateMapData($_REQUEST['id'], $_REQUEST['tile']);

// データベースから全プレイヤーのデータを取得
$json = json_encode($data->getPlayerData());
// データの更新
$data->end();
//----------------------------
//クライアントに出力
//----------------------------
header('Access-Control-Allow-Origin: *');
print $json;

