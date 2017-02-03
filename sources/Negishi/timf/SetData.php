<?php

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
	//魚配置
	//-------------------------------------------------
	for ($i = 0; $i < 49; $i++) {			

		$fish = rand(1, 3);
		// sql write		
		$sql = 'INSERT INTO Map values('.$i.', '.$fish.', 0)';

		// SQL run
		$dbh = new PDO($dsn, $user, $pw);	// connection
		$sth = $dbh->prepare($sql);			// SQL preparation
		$sth->execute();						// run
	}
	
	//-------------------------------------------------
	//プレイヤー配置
	//-------------------------------------------------
	
	$putPos = range(1, 49);
	shuffle($putPos);
	
	for ($i = 1; $i <= 4; $i++) {
				
		// sql write		
		$sql = 'UPDATE Map SET (position = position, fish = 0, id = 0)';

		// SQL run
		$dbh = new PDO($dsn, $user, $pw);	// connection
		$sth = $dbh->prepare($sql);			// SQL preparation
		$sth->execute();						// run
	}
	
	print ($putPos[1]);

	

