<?php
	class PlayerData
	{
		public $name;
		public $number;
		function __construct($name,$number)
		{
			$this->name = $name;
			$this->number = $number;
		}
	}


	class FileClass
	{
		private $fileName;
		function __construct($fileName)
		{
			$this->fileName = $fileName;
		}
		
		function Write()
		{
		}
		//末尾追加
		function Add($name,$num)
		{
			//末尾にポインタを置く
			$sfp = fopen($this->fileName,'a');
			fwrite($sfp,$name);
			fwrite($sfp,",");
			fwrite($sfp,$num);
			fwrite($sfp,"\n");
			fclose($sfp);
		}
		
		function Read()
		{	
			$sfp = fopen($this->fileName,'r');
			$datas = [];
			while(($data = fgets($sfp)) !== false)
			{
				$data = rtrim($data);
				$strArray = explode(",",$data);
				$datas[] = new Data($strArray[0],$strArray[1],$strArray[2]);
			}
			fclose($sfp);
			return $datas;
		}
		//行数取得
		function ColumCount()
		{
			$result = 0;
			$sfp = fopen($this->fileName,'r');
			while(($data = fgets($sfp)) !== false)
			{
				$result +=1;
			}
			fclose($sfp);
			
			return $result;
		}
		
		function GetData($colum)
		{
			$result;
			$sfp = fopen($this->fileName,'r');
			$cnt=0;
			while(($data = fgets($sfp)) !== false)
			{
				$cnt +=1;
				if($cnt == $colum)
				{
					$data = rtrim($data);
					$strArray = explode(",",$data);
					$result=new PlayerData($strArray[0],$strArray[1]);
					break;
				}
			}
			fclose($sfp);
			
			return $result;
		}
	};

