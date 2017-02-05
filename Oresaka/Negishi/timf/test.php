<html>
	<head>
	  <title>Hello WebAPI</title>
	  <style type="text/css">
	  	#result{
	  		border: 1px solid gray;
	  		 width: 100px;
	  		height: 80px;
	  	}
	  </style>
	</head>
	<body>
		<div id="result"></div>
		<form>
			<Input id="testbtn" type="button" value="TEST" onclick="">
		</form>

		<form>
			<Input id="update" type="button" value="UPDATE" onclick="">
		</form>
		
		<?php 
			$val = include("SetStartData.php");
			if ($val) {
				echo "OK";
			} else	{
				echo "NO";
			};
		?>

		<script src="js/jquery-3.1.1.min.js"></script>
		<script>
		$(document).ready(function(){

			/*
			$.ajax({
				  url: "/timf/GetStartUserID.php"
				, dataType: "json"
				, success: function( json ) {
						result = json;
					  $("#result").html(result);
				}
			});
			*/

			$("#testbtn").click(function(){
				$.ajax({
					  url: "/timf/GetStartUserID.php"
					, dataType: "json"
					, success: function( json ) {
							result = json;
						  $("#result").html(result);
					}
				});
		  	});
		  	
		  	$("#update").click(function(){
		  		
		  		window.location.reload();
		  	});

		});
		</script>
	</body>
</html>
