<script src="js/jquery-3.1.1.min.js"></script>
<script>
$(document).ready(function(){
	$timer = 3;
	$("#test").html($timer);
	//1秒毎に実行
	setInterval(function(){
		$timer--;
		//console.log($timer);
		//数字を描画
		$html="";
		
		$html +=($timer);
		$("#test").html($html);
		//時間切れの場合
		if($timer <= 0)
		{
			//データを送る
			console.log("Data_Send");
		}
		
	},1000);
});
</script>

<html>
	<head>
		<title> Timer Sample</title>
		<style type ="text/css">
		/*右揃え*/
		#test
		{
			text-align: right;
			font-size: 800%;
		}
		</style>
	</head>
	
	<body>
		<div id="test"></div>
	</body>
</html>
