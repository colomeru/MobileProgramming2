<?php

	//クラスの使用許可
	require('MapDataClass.php');
	require('SaveDataClass.php');
	
	$source = new MapDataClass();
	$player = new SaveDataClass();

	$result = [49];
	for ($i=0; $i<49; $i++)
	{
		$id = $source->GetMapID($i);
		$playerData = $player->findPlayerData($id);
		$result[$i] = ['fish' => $source->GetMapFishCount($i), 'ID' => $id, 'Exist' => $id != 0 && $playerData['position'] == $i];				
	}
		
	$json = json_encode($result);
	header('Access-Control-Allow-Origin: *');
	print $json;
