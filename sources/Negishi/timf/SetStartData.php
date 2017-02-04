<?php
	//--------------------------------------
	//ゲーム開始時マップデータ生成処理
	//--------------------------------------

	// sql実行準備
	$dsn  	= 'mysql:dbname=Fishing;host=127.0.0.1';
	$user 	= 'root';
	$pw	  	= 'H@chiouji1';
	
	//-------------------------------------------------
	//データベース初期化
	//-------------------------------------------------	
	// write sql
	$sql = 'DELETE FROM Map';
	
	// SQL run
	$dbh = new PDO($dsn, $user, $pw);	// connection
	$sth = $dbh->prepare($sql);			// SQL preparation
	$sth->execute();						// run

	//-------------------------------------------------
	//データ配置
	//-------------------------------------------------
	// fish Data
	$fishCount = range(1, 49);
	shuffle($fishCount);

	for ($i = 0; $i < 49; $i++) {			
		if ($fishCount[$i] === 1){
			// sql write
			// 1P配置
			$sql = 'INSERT INTO Map values('.$i.', 0, 1)';
		} else if ($fishCount[$i] === 2){
			// sql write		
			// 2P配置
			$sql = 'INSERT INTO Map values('.$i.', 0, 2)';		
		} else if ($fishCount[$i] === 3){
			// sql write
			// 3P配置
			$sql = 'INSERT INTO Map values('.$i.', 0, 3)';		
		} else if ($fishCount[$i] === 4){
			// sql write
			// 4P配置
			$sql = 'INSERT INTO Map values('.$i.', 0, 4)';		
		} else if ($fishCount[$i] <= 10){
			// sql write
			// 魚3尾配置	
			$sql = 'INSERT INTO Map values('.$i.', 3, 0)';		
		} else if ($fishCount[$i] <= 25){
			// sql write
			// 魚2尾配置
			$sql = 'INSERT INTO Map values('.$i.', 2, 0)';		
		} else {
			// sql write
			// 魚1尾配置
			$sql = 'INSERT INTO Map values('.$i.', 1, 0)';		
		}

		// SQL run
		$dbh = new PDO($dsn, $user, $pw);	// connection
		$sth = $dbh->prepare($sql);			// SQL preparation
		$sth->execute();						// run
	}
	
