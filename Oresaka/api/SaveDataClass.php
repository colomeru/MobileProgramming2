<?php
	//データ保存クラス
	 class SaveDataClass{
	 //sqlクラスの宣言
	 private $sql;
	 //コンストラクタ
	   function __construct(){
		   //クラスの使用許可
	   		require('SQLClass.php');
			//生成
	   		$this->sql = new SQLClass();
			//初期化
			$this->sql->Begin();
	   }
	   
	   //データの更新
	   function updateData($id = null, $position = null){

	   		//パラメータの更新
			$order = "UPDATE User SET position = '$position' WHERE user_id = '$id'";
	   		$this->sql->VoidFunc($order);
			//次の順番のid
	   		$next_id = $this->NextTurn() + 1;
	   		//次の順番の更新
			$order = "UPDATE User SET next_id = '$next_id'";
	   		$this->sql->VoidFunc($order);
 		}
 		
		//次の順番の取得
 		function NextTurn(){
 			$order = "SELECT * FROM User WHERE user_id = '1'";
	   		$sth   = $this->sql->Func($order);
	   		$dump  = $sth->fetch();	
	   		$result = $dump['next_id'] + 1;
	   		return $result % 4;
 		}
 		
		//指定されたidのデータを検索
 		function findPlayerData($id){
			$order = "SELECT * FROM User WHERE user_id = '$id'";
	   		$sth   = $this->sql->Func($order);
	    	return $sth->fetch();
    	} 		
 		    	
		//Json形式用データの取得
		function getPlayerData(){
			$player1 = $this->findPlayerData(1);
			$player2 = $this->findPlayerData(2);
			$player3 = $this->findPlayerData(3);
			$player4 = $this->findPlayerData(4);
				
			$playerData = [
				 ['id'=>'1', 'position'=>$player1['position'], 'next_id'=>$player1['next_id']]
		   		,['id'=>'2', 'position'=>$player2['position'], 'next_id'=>$player2['next_id']]
		   		,['id'=>'3', 'position'=>$player3['position'], 'next_id'=>$player3['next_id']]
		   		,['id'=>'4', 'position'=>$player4['position'], 'next_id'=>$player4['next_id']]
			];
						
			return $playerData;
		}
		
		//終了処理
		function end(){
	   		$this->sql->End();
		}
	}
?>
