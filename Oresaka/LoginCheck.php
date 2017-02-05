<?php
	require("FileClass.php");
	//UserName.txtを開く
	$file = new FileClass("UserName.txt");
	//現在何人のユーザーが登録しているか
	$userNum = $file->ColumCount();
	$errorCode = '0000';
	//名前の取得
	$userName = $_GET['userName'];
	//既に四人登録している場合
	if($userNum >= 4)
	{
		$errorCode = '1003';
		NextPage($userName,$userNum,$errorCode);
		exit();
	}
	else if ($userNum === 0)
	{
		require("./api/SetStartData.php");
	}
	
	//未入力の場合
	if(empty($userName))
	{
		//ERROR
		$errorCode = '1001';
		NextPage($userName,$userNum,$errorCode);
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
			$errorCode = '1002';
			NextPage($userName,$userNum,$errorCode);
			exit();
			break;
		}
	}
	$userNum += 1;


	//テキストに追加
	$file->Add($userName,$userNum);
	NextPage($userName,$userNum,$errorCode);
	
	function NextPage($userName,$userNum,$errorCode)
	{	
		//ゲーム開始へ 名前とnumberをjsonで返す
		$json_data = [
      		'name'=>$userName, 
      		'number'=>$userNum,
      		'error_code' =>$errorCode,
		];
		//print("Name".$userName."\n");
		//print("Number".$userNum."\n");
		//print("Code".$errorCode."\n");
		//JSON形式に変換
		$json = json_encode($json_data);
		header('Access-Control-Allow-Origin: *');
		print $json;
		exit();
	}
	
?>
