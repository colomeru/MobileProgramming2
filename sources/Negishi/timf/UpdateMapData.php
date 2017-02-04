<?php
	// データ取得
	$id 	= $_REQUEST['id'];
	$pos	= $_POST['pos'];
	
	print $_POST['id'];
	
	// sql実行準備
	$dsn  	= 'mysql:dbname=Fishing;host=127.0.0.1';
	$user 	= 'root';
	$pw	  	= 'H@chiouji1';
	
	// write sql
	$sql = "UPDATE Map SET id = '$id' WHERE position = '$pos' AND id != '$id'";
	
	// SQL run
	$dbh = new PDO($dsn, $user, $pw);	// connection
	$sth = $dbh->prepare($sql);			// SQL preparation
	$sth->execute();						// run

