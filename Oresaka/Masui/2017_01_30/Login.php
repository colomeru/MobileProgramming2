<html>
	<head>
		<title>Oresaka-Login</title>
	</head>
	<body>
		<h1>この魚は俺のもんだ!!</h1>
		<form>
		<span>YourName</span>
		<input name ="userName" id="Name"><br>
		<input type="button" id="Login"  value="Game Play">
		<input type="hidden" name="fish_sum" value="0">
		<input type="hidden" name="tile" value="0">
		</form>
		<form action="Error.php" id="frm">
		<input type="hidden" id="error_code"  name ="error_code" value="">
		</form>
		<form action="GamePlay.php" id="gamePlay">
		<!--<input type="hidden" id="name"  name ="name" value="">
		<input type="hidden" id="number"  name ="number" value="">
		<input type="hidden" id="error_code"  name ="error_code" value="">-->
		</form>
<div id="result"></div>
		<script src="js/jquery-3.1.1.min.js"></script>
		<script>
$(document).ready(function(){
				$("#Login").click(function(){
					$.ajax({
          					url: "LoginCheck.php"
          					, data: {userName: $("#Name").val()}
        					, dataType: "json"
        					, success: function( json ) 
        	{
        		if(json['error_code'] == '0000')
        		{
        			console.log("LOGIN");
        			//ログイン処理
       	   		$("#name").attr("value",json['name']);
       	   		$("#number").attr("value",json['number']);
       	   		$("#error_code").attr("value",json['error_code']);
       	   		$("#gamePlay").submit();
        		}
        		else
        		{
        			console.log("ERROR");
        			//エラー処理
       	   		$("#error_code").attr("value",json['error_code']);
       	   		$("#frm").submit();
        		}
        	}
    	});
  	});
});
    </script>
	</body>
</html>
