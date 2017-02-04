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

		<form action="DataCheck.php">
			<input type="hidden" name="name" value = "<?php print $_REQUEST['name'] ?>">
			<input type="hidden" name="id" value="1">
			<input type="hidden" name="fish_sum" value="0">
			<?php $key = 'name';?>
    		<?php if($_REQUEST[$key] == Null)
    		{ ?>
    		   	<meta http-equiv="refresh"content="0;URL=Login.php">
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
       	     url: "api/test.php"
       	   , dataType: "json"
       	   , data:
         	 {
          		name: '<?php print $_REQUEST['name'] ?>',
          		id: '<?php print $_REQUEST['id'] ?>',
          		fish_sum: '<?php print $_REQUEST['fish_sum'] ?>',
          		tile: '<?php print $_REQUEST['tile'] ?>'
          	 },
				success: function( json )
          	{
          		$result = '';
          	
          		$number = 0;
          		for($i = 0; $i < 2; $i++)
          		{
          			for($j = 0; $j < 2; $j++)
          			{
          				$number += 1;
          				if(json[$i *2 + $j]['fish_sum']==1)
          				{
          					$result += '<button name="tile" value=' + $number + '><img src="img/1.png"></button>';
          				}
          				else if(json[$i *2 + $j]['fish_sum']==2)
          				{
          					$result += '<button name="tile" value=' + $number + '><img src="img/2.png"></button>';
          				}
          				else if(json[$i *2 + $j]['fish_sum']==3)
          				{
          					$result += '<button name="tile" value=' + $number + '><img src="img/3.png"></button>';
          				}
          				else
          				{
          					if(json[$i *2 + $j]['id']==1)
          					$result += '<button name="tile" value=' + $number + '><img src="img/player1.png"></button>';
          					if(json[$i *2 + $j]['id']==2)
          					$result += '<button name="tile" value=' + $number + '><img src="img/player2.png"></button>';
          					if(json[$i *2 + $j]['id']==3)
          					$result += '<button name="tile" value=' + $number + '><img src="img/player3.png"></button>';
          					if(json[$i *2 + $j]['id']==4)
          					$result += '<button name="tile" value=' + $number + '><img src="img/player4.png"></button>';
          				}          			
          			}
          			$result+="<br>";
         		}
    	     	$result += json[0]['id'] + json[0]['position'] + json[0]['fish_sum'] + json[0]['next_id'];
       	  	$result+="<br>";
       	  	$result += json[1]['id'] + json[1]['position'] + json[1]['fish_sum'] + json[1]['next_id'];
       	  	$result+="<br>";
       	  	$result += json[2]['id'] + json[2]['position'] + json[2]['fish_sum'] + json[2]['next_id'];
       	  	$result+="<br>";
       	  	$result += json[3]['id'] + json[3]['position'] + json[3]['fish_sum'] + json[3]['next_id'];
       	  	$result+="<br>";
         	
       	  	$("#foo").html($result);
        	  }
    		});
    
    		$("#map").click(function()
    		{
       	   	$result = ' ';
       	   	$result += "test";
       	   	$("#hoge").html($result);
    		});
		});
		</script>
	</form>
</body>
</html>



