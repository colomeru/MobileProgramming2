<?php
	// マップデータクラス
	class MapDataClass{
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
		
		// マップデータ更新
		function UpdateMapData($id, $pos){
		
			// write sql
			$sql = "UPDATE Map SET id = '$id' WHERE position = '$pos' AND id != '$id'";
	
			// SQL run
			$dbh = new PDO($this->dsn, $this->user, $this->pw);	// connection
			$sth = $dbh->prepare($sql);								// SQL preparation
			$sth->execute();											// run			
		}
		
		// マップ内魚数取得
		function GetMapFishCount($pos){
			// write sql
			$sql = "SELECT fish FROM Map WHERE position = '$pos'";

			// SQL run
			$dbh = new PDO($this->dsn, $this->user, $this->pw);	// connection
			$sth = $dbh->prepare($sql);								// SQL preparation
			$sth->execute();											// run			
			
			// 要求要素を取り出し出力
			$result = $sth->fetch();
			return $result['fish'];
		}

		// マップ内魚数取得
		function GetMapID($pos){
			// write sql
			$sql = "SELECT id FROM Map WHERE position = '$pos'";

			// SQL run
			$dbh = new PDO($this->dsn, $this->user, $this->pw);	// connection
			$sth = $dbh->prepare($sql);								// SQL preparation
			$sth->execute();											// run			
			
			// 要求要素を取り出し出力
			$result = $sth->fetch();
			return $result['id'];
		}

		// プレイヤー獲得魚数取得
		function GetPlayerFishCount($id){
			// write sql
			$sql = "SELECT SUM(fish) FROM Map WHERE id = '$id'";

			// SQL run
			$dbh = new PDO($this->dsn, $this->user, $this->pw);	// connection
			$sth = $dbh->prepare($sql);								// SQL preparation
			$sth->execute();											// run			

			// 要求要素を取り出し出力
			$result = $sth->fetch();
			return $result['SUM(fish)'];
		}
		
		// プレイヤー領域取得
		function GetPlayerTerritory($id){
			// write sql
			$sql = "SELECT position FROM Map WHERE id = '$id'";

			// SQL run
			$dbh = new PDO($this->dsn, $this->user, $this->pw);	// connection
			$sth = $dbh->prepare($sql);								// SQL preparation
			$sth->execute();											// run			

			return $sth->fetch();
		}
	}

