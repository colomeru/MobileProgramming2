<html>
    <head>
        <title>Oresaka</title>
        <style type="text/css">
        	.$number
        	{
        		margin:15px;
			}
        </style>
    </head>

    <body>

		<form>
			<input type="hidden" name="name" value = "<?php print $_REQUEST['name'] ?>">
			<input type="hidden" name="id" value="<?php print $_REQUEST['id'] ?>">
			
			<?php $key = 'name';?>
    		<?php if($_REQUEST[$key] == Null)
    		{ ?>
    		   <!--	<meta http-equiv="refresh"content="0;URL=Login.php">-->
   	 		<?php }?>
        
        
       	<p>
           	<Div Align="right">
           	<h1>
            	<?php print $_REQUEST[$key]; ?>
            	</h1>
           	</Div>
       	</p>
       		
    		<div id="foo"></div><br> 
    		<div id="poscheck"></div><br>
    
			<div id="hoge"></div>
			<script src="js/jquery-3.1.1.min.js"></script>

			<script>
			$(document).ready(function(){	
					
					$.ajax({
		   	     		  url: "./api/UpdatePlayerData.php"
		   	   			, dataType: "json"
		   	   			, data:
				 	 	{
				  			name: '<?php print $_REQUEST["name"] ?>',
				  			id:   '<?php print $_REQUEST["id"] ?>',
				  			tile: '<?php print $_REQUEST["tile"] ?>'
				  	 	}
				  	 	,  success: function( json ){
						}				
					});
         					
				$.ajax({
					  url: "./api/LoadMap.php"
					, dataType: "json"
					, success: function( json )
					{
						$mapSize = 7;
				  	 		$ID = "<?php print $_REQUEST['id'];?>" -1;
				  	 		console.log($ID);
							//進める道の検査　ほぼ同じ処理をコピペしています
							        	$playerPos = -1;
						 	for($i=0;$i<$mapSize * $mapSize;$i++)
						 	{
						 		if(json[$i]['ID']=="<?php print $_REQUEST['id'];?>"&&json[$i]["Exist"])
						 		{
						 			$playerPos = $i;
						 			break;
						 		}
						 	}
						 	//移動可能なポジション配列
						 	//マップの端に辿り着いているかの関数
						 	$isLeft = function($pos)
						 	{
						 		return $pos % $mapSize == 0;
						 	};
						 	$isRight = function($pos)
						 	{
						 		return $pos % $mapSize == $mapSize-1;
						 	};
						 	
						 	$isTop = function($pos)
						 	{
						 		return $pos - $mapSize < 0;
						 	};
						 	
						 	$isDown = function($pos)
						 	{
						 		$mapAll = $mapSize * $mapSize;
						 		
						 		return $pos + $mapSize > $mapAll
						 	};
						 	$pos = $playerPos;
						 	$movePositions = [($mapSize-1) * 4];//最大で通れる道の数
						 	$moveIndex=0;
						 	$test ="";
						 	//左にどれだけ進めるか
						 	if(!$isLeft($pos))//
						 	{
						 	   do
						 		{
						 			$pos--;
						 			if(json[$pos]['ID'] != 0) break;
						 			$movePositions[$moveIndex++] = $pos;
						 			$test +=$pos;
						 			$test += ",";
						 		}while(!$isLeft($pos))//左端でない場合
						 	}
						 	$pos = $playerPos;
						 	//右にどれだけ進めるか
						 	if(!$isRight($pos))//
						 	{
						 	   do
						 		{
						 			$pos++;
						 			if(json[$pos]['ID'] != 0) break;
						 			$movePositions[$moveIndex++] = $pos;
						 			$test +=$pos;
						 			$test += ",";
						 		}while(!$isRight($pos))//左端でない場合
						 	}
						 	//上にどれだけ進めるか
						 	$pos = $playerPos;
						 	if(!$isTop($pos))//
						 	{
						 	   do
						 		{
						 			$pos-= $mapSize;
						 			if(json[$pos]['ID'] != 0) break;
						 			$movePositions[$moveIndex++] = $pos;
						 			$test +=$pos;
						 			$test += ",";
						 		}while(!$isTop($pos))//左端でない場合
						 	}
						 	//下にどれだけ進めるか
						 	$pos = $playerPos;
						 	if(!$isDown($pos))//
						 	{
						 	   do
						 		{
						 			$pos += $mapSize;
						 			if(json[$pos]['ID'] != 0) break;
						 			$movePositions[$moveIndex++] = $pos;
						 			$test +=$pos;
						 			$test += ",";
						 		}while(!$isDown($pos))//左端でない場合
						 	}
						 	
						 	//右下
						 	$pos = $playerPos;
						 	if(!$isDown($pos) && !$isRight($pos))//
						 	{
						 	   do
						 		{
						 			$pos += $mapSize + 1;
						 			if(json[$pos]['ID'] != 0) break;
						 			$movePositions[$moveIndex++] = $pos;
						 			$test +=$pos;
						 			$test += ",";
						 		}while(!$isDown($pos) && !$isRight($pos))//左端でない場合
						 	}
						 	//右上
						 	$pos = $playerPos;
						 	if(!$isTop($pos) && !$isRight($pos))//
						 	{
						 	   do
						 		{
						 			$pos -= ($mapSize - 1);
						 			if(json[$pos]['ID'] != 0) break;
						 			$movePositions[$moveIndex++] = $pos;
						 			$test +=$pos;
						 			$test += ",";
						 		}while(!$isTop($pos) && !$isRight($pos))//左端でない場合
						 	}
						 	//左下
						 	$pos = $playerPos;
						 	if(!$isDown($pos) && !$isLeft($pos))//
						 	{
						 	   do
						 		{
						 			$pos += ($mapSize - 1);
						 			if(json[$pos]['ID'] != 0) break;
						 			$movePositions[$moveIndex++] = $pos;
						 			$test +=$pos;
						 			$test += ",";
						 		}while(!$isDown($pos) && !$isLeft($pos))//左端でない場合
						 	}
						 	//左上
						 	$pos = $playerPos;
						 	if(!$isTop($pos) && !$isLeft($pos))//
						 	{
						 	   do
						 		{
						 			$pos -= ($mapSize + 1);
						 			if(json[$pos]['ID'] != 0) break;
						 			$movePositions[$moveIndex++] = $pos;
						 			$test +=$pos;
						 			$test += ",";
						 		}while(!$isTop($pos) && !$isLeft($pos))//左端でない場合
						 	}	
						 	for($i=0;$i< $movePositions.length;$i++)
						 	{
						 		console.log($movePositions[$i]);
						 		"<?php 
						 			require('MovePosition.php');
						 			$movePosClass = new MovePosition();
						 			$movePosClass->Update($_REQUEST['id'], $movePosition[$i]);						 			
						 		?>"
						 	}
						
					 	$result = "";
					 	$number = 0;					 	
					 	for ($i=0; $i<7; $i++){
					 		for ($j=0; $j<7; $j++){					 
					 			if(json[$i *7 + $j]['Exist']){
					 				$result += '<button name="tile" id="map" value=' + $number + '><img src="img/penguin' + json[$i *7 + $j]['ID'] + '.png"></button>';		
					 			}
								else if(json[$i *7 + $j]['ID']==0)
								{
									if(json[$i *7 + $j]['fish']==1)
				  					{
				  						$result += '<button name="tile" id="map" value=' + $number + '><img src="img/1.png"></button>';
				  					}
					  				else if(json[$i *7 + $j]['fish']==2)
					  				{
					  					$result += '<button name="tile" id="map" value=' + $number + '><img src="img/2.png"></button>';
					  				}
					  				else if(json[$i *7 + $j]['fish']==3)
					  				{
					  					$result += '<button name="tile" id="map" value=' + $number + '><img src="img/3.png"></button>';
					  				}
				  				}
				  				else
				  				{			  				
				  					if(json[$i *7 + $j]['ID']==1)
				  					$result += '<button "name="tile" id="map" value=' + $number + '><img src="img/player1.png"></button>';
				  					else if(json[$i *7 + $j]['ID']==2)
				  					$result += '<button name="tile" id="map" value=' + $number + '><img src="img/player2.png"></button>';
				  					else if(json[$i *7 + $j]['ID']==3)
				  					$result += '<button name="tile" id="map" value=' + $number + '><img src="img/player3.png"></button>';
				  					else if(json[$i *7 + $j]['ID']==4)
				  					$result += '<button name="tile" id="map" value=' + $number + '><img src="img/player4.png"></button>';
				  				}
				  				$number += 1;					 		
					 		}
					 		$result+="<br>";
					 	}
					  	$("#foo").html($result);
					}
				});
				
			
			});
			</script>
		</form>
	</body>
</html>



