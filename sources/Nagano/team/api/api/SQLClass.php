<?php 
	class SQLClass
	{
		private $dsn;
		private $user;
		private $pw;
		private $dbh;
		function __construct()
		{
			$this->dsn = 'mysql:dbname=Fishing;host=127.0.0.1';
			$this->user = 'root';
			$this->pw ='H@chiouji1';
		}
		
		function Begin()
		{
			$this->dbh = new PDO($this->dsn,$this->user,$this->pw);
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
		}	
		
		//実行
		function Func($order)
		{
			$sth = $this->dbh->prepare($order);
			$sth->execute();
			return $sth;
		}
		
		function VoidFunc($order)
		{
			$sth = $this->dbh->prepare($order);
			$sth->execute();
		}
		function End()
		{
			$sth = $this->dbh->prepare("exit;");
		}
	}
?>
