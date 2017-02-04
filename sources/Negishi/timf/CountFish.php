<?php
	// 所持魚カウントクラス
	class CountFishClass{
		// 宣言
		private 	$dsn;
		private	$user;
		private	$pw;
		
		// コンストラクタ
		function __construct(){
			// sql実行準備
			$this->dsn  	= 'mysql:dbname=Fishing;host=127.0.0.1';
			$this->user 	= 'root';
			$this->pw	  	= 'H@chiouji1';		
		}
		
		// カウントsql実行
		function GetFishCount($id){
			// write sql
			$sql = "SELECT SUM(fish) FROM Map WHERE id = '$id'";

			// SQL run
			$dbh = new PDO($this->dsn, $this->user, $this->pw);	// connection
			$sth = $dbh->prepare($sql);								// SQL preparation
			$sth->execute();											// run			

			return $sth->fetch();
		}		
	}

	
	//-------------------------------------------------
	//データ取得
	//-------------------------------------------------	
	// 初期準備
	$data = "";
	$sorce = new CountFishClass();
	
	// 各プレイヤーsql実行
	$p1 = $sorce->GetFishCount(1);
	$p2 = $sorce->GetFishCount(2);
	$p3 = $sorce->GetFishCount(3);
	$p4 = $sorce->GetFishCount(4);
	
	// 連想配列に格納
	$data = [
			['id'=>1, 'fish_sum'=>$p1['SUM(fish)']],
			['id'=>2, 'fish_sum'=>$p2['SUM(fish)']],
			['id'=>3, 'fish_sum'=>$p3['SUM(fish)']],
			['id'=>4, 'fish_sum'=>$p4['SUM(fish)']]
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
