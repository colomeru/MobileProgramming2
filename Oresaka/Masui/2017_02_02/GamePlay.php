<html>

    <head>
        <title>Chat</title>
        <style type="text/css">
        	.$number
        	{
        		margin:15px;
			}
        </style>
    </head>

    <body>
    	
        <?php 
            $key = 'name';
         ?>
        <?php if($_REQUEST[$key] == Null) { ?>
        	<!--<meta http-equiv="refresh"content="0;URL=Login.php">-->
        <?php }?>
        
       <p>
            <Div Align="right">
            <h1>
             <?php print $_REQUEST[$key]; ?>
             </h1>
            </Div>
        </p>

<form>
	<input id="mapbtn" type="button" value="Map">
</form>

<script src="js/jquery-3.1.1.min.js"></script>
<script>
$(document).ready(function(){
    $("#mapbtn").click(function()
    {
      $.ajax({
            url: "api/hello.php"
          , dataType: "json"
          , data: {name:"aaaa"}
          , success: function( json )
          {
          	$mapSize = 5;
          	/***************************************************************************************************************************/
          	//進める道の検査　ほぼ同じ処理をコピペしています
          	//プレイヤーの位置
         	$playerPos = -1;
         	for($i=0;$i<$mapSize * $mapSize;$i++)
         	{
         		if(json[$i]['id']==1)
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
         			if(json[$pos]['fish'] == 0) break;
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
         			if(json[$pos]['fish'] == 0) break;
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
         			if(json[$pos]['fish'] == 0) break;
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
         			if(json[$pos]['fish'] == 0) break;
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
         			if(json[$pos]['fish'] == 0) break;
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
         			if(json[$pos]['fish'] == 0) break;
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
         			if(json[$pos]['fish'] == 0) break;
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
         			if(json[$pos]['fish'] == 0) break;
         			$movePositions[$moveIndex++] = $pos;
         			$test +=$pos;
         			$test += ",";
         		}while(!$isTop($pos) && !$isLeft($pos))//左端でない場合
         	}
          	/***************************************************************************************************************************/
          	$result = '';
          	$number = 0;
          for($i = 0; $i < $mapSize; $i++)
          	{
          		for($j = 0; $j < $mapSize; $j++)
          		{
          			$number =$i *$mapSize + $j;
          			
          			$isContinue = false;
          			for($k=0;$k<$moveIndex;$k++)
          			{
          				if($number == $movePositions[$k])
          				{
          					$isContinue = true;
          					$result += '<input type="image"src="img/moveRood.png", id = "map">';
          					break;
          				}
					}
					if($isContinue) continue;
          			if(json[$number]['fish']==1)
          			{
          				$result += '<input type="image"src="img/1.png", id = "map">';
          			}
          			else if(json[$number]['fish']==2)
          			{
          				$result += '<input type="image"src="img/2.png", id = "map">';
          			}
          			else if(json[$number]['fish']==3)
          			{
          				$result += '<input type="image"src="img/3.png", id = "map">';
          			}
          			else
          			{
          				if(json[$i *$mapSize + $j]['id']==1)
          				$result += '<input type="image" src="img/player1.png",  id = "map">';
          				if(json[$i *$mapSize + $j]['id']==2)
          				$result += '<input type="image" src="img/player2.png", id = "map">';
          				if(json[$i *$mapSize + $j]['id']==3)
          				$result += '<input type="image" src="img/player3.png", id = "map">';
          				if(json[$i *$mapSize + $j]['id']==4)
          				$result += '<input type="image" src="img/player4.png",id = "map">';
          			}
          		}
          		$result+="<br>";
         	}
         	
			$result += $test;
          $("#foo").html($result);
          }
      });
    });
});
</script>
        <div id="foo"></div>
        
        
        <?php
        print $_REQUEST['name'];
		 ?>
	
    </body>

</html>
