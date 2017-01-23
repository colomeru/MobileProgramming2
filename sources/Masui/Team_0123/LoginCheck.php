<?php
	require("FileClass.php");
	//UserName.txtを開く
	$file = new FileClass("UserName.txt");
	//現在何人のユーザーが登録しているか
	$userNum = $file->ColumCount();
	//既に四人登録している場合
	if($userNum >= 4)
	{
		//ERROR
		//1003
	}
	
	//名前の取得
	$userName = $_GET['name'];
	//未入力の場合
	if(empty($userName))
	{
		//ERROR
		$errorCode = 1001;
	}
	$data;
	//重複確認
	for($i=1;$i<=$userNum;$i++)
	{
		//行を取得
		$data = $file->GetData($i);
		//同じ名前があったら
		if($data->name == $userName)
		{
			//ERROR
			//1002
			break;
		}
	}
	$userNum += 1;
	//ゲーム開始へ 名前とnumberをjsonで返す
	$json_data = [
      'name'=>$userName, 
      	'number'=>$userNum
];

	//テキストに追加
	$file->Add($userName,$userNum);
	//JSON形式に変換
	$json = json_encode($json_data);
	
	header('Access-Control-Allow-Origin: *');
	print $json;
	
	
	
?>
