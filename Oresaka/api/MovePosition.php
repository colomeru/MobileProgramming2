<?php
	class MovePositionClass{
	
		function __construct(){
			require("SQLClass.php");		
		}
		
		function Update($id, $position){
			$sql = new SQLClass();
			$sql->Begin();
			//
			$sql->VoidFunc("UPDATE MoveTable SET id =" $id "WHERE position = "$position);
	
			$sql->End();
		}
	}




