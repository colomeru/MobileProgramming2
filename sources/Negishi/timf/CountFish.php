<?php
	//-------------------------------------------------
	//取得魚数取得
	//-------------------------------------------------	
		
	//クラスの使用許可
	require('./MapDataClass.php');
	$sorce = new MapDataClass();
	
	// 各プレイヤーsql実行
	$p1 = $sorce->GetPlayerFishCount(1);
	$p2 = $sorce->GetPlayerFishCount(2);
	$p3 = $sorce->GetPlayerFishCount(3);
	$p4 = $sorce->GetPlayerFishCount(4);

	// 連想配列に格納
//	$data = [
//			['id'=>1, 'fish_sum'=>$p1['SUM(fish)']],
//			['id'=>2, 'fish_sum'=>$p2['SUM(fish)']],
//			['id'=>3, 'fish_sum'=>$p3['SUM(fish)']],
//			['id'=>4, 'fish_sum'=>$p4['SUM(fish)']]
//	];
	$data = [
			['id'=>1, 'fish_sum'=>$p1],
			['id'=>2, 'fish_sum'=>$p2],
			['id'=>3, 'fish_sum'=>$p3],
			['id'=>4, 'fish_sum'=>$p4]
	];

	
	//$num = $sorce->GetMapFishCount(8);
	//print $num['fish'] + '<br>';
	
	//----------------------------
	//JSON形式に変換
	//----------------------------
	$json = json_encode($data);

	//----------------------------
	//クライアントに出力
	//----------------------------
	header('Access-Control-Allow-Origin: *');
	print $json;
