<html>
<head>
<title>Hello WebAPI</title>
<style type="text/css">
#result{
	border: 1px solid gray;
	 wight: 100px;
	height: 80px;
}
</style>
</head>
<body>
<?php $val = include("../api/test.php"); echo $val; ?>

<div id="result"></div>

<form>
  <input id="gachabtn" type="button" value="Gacha">
</form>

<script src="js/jquery-3.1.1.min.js"></script>
<script>
$(document).ready(function(){
	$("#gachabtn").click(function(){
		$.ajax({
	          url: "../api/test.php"
	        , dataType: "json"
	        , success: function( json ) {
	        		result="";
	        		for(i=0; i<json.length; i++){
	        			tmp     = json[i];
	        			result += tmp["id"] + " " + tmp["position"] + " " + tmp["fish_sum"] + " " + tmp["next_id"] + "<br>";
	        		}
	              $("#result").html(result);
	        }
	    });
	});
});
</script>

</body>
</html>

