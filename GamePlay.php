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
        	<meta http-equiv="refresh"content="0;URL=Login.php">
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
            url: "/api/hello.php"
          , dataType: "json"
          , data: {name:"aaaa"}
          , success: function( json )
          {
          	$result = '';
          	$number = 0;
          for($i = 0; $i < 2; $i++)
          	{
          		for($j = 0; $j < 2; $j++)
          		{
          			$number += 1;
          			if(json[$i *2 + $j]['fish']==1)
          			{
          				$result += '<input type="image"src="img/1.png", number= $number, id = "map">';
          			}
          			else if(json[$i *2 + $j]['fish']==2)
          			{
          				$result += '<input type="image"src="img/2.png", number= $number, id = "map">';
          			}
          			else if(json[$i *2 + $j]['fish']==3)
          			{
          				$result += '<input type="image"src="img/3.png", number= $number, id = "map">';
          			}
          			else
          			{
          				if(json[$i *2 + $j]['id']==1)
          				$result += '<input type="image" src="img/player1.png", number = $number, id = "map">';
          				if(json[$i *2 + $j]['id']==2)
          				$result += '<input type="image" src="img/player2.png", number = $number, id = "map">';
          				if(json[$i *2 + $j]['id']==3)
          				$result += '<input type="image" src="img/player3.png", number = $number, id = "map">';
          				if(json[$i *2 + $j]['id']==4)
          				$result += '<input type="image" src="img/player4.png", number = $number, id = "map">';
          			}
          			
          		}
          		$result+="<br>";
         	}
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
