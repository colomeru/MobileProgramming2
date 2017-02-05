<html>

    <head>
        <title>Error</title>
    </head>

    <body>
    	
        <?php 
            $key = 'error_code';
         ?>
        <?php if($_REQUEST[$key] === '1001') { ?>
        	<p><font color="ff0000">名前を記入してください</font></p>
        <?php }?>
        
        <?php if($_REQUEST[$key] === '1002') { ?>
        	<p><font color="ff0000">同じ名前の人がいます</font></p>
        <?php }?>
        
        <?php if($_REQUEST[$key] === '1003') { ?>
        	<p><font color="ff0000">すでに4人でゲームを始めています</font></p>
        <?php }?>
        
        <form action="Login.php">
            <input type="submit" value="ログイン画面に戻る"/>
        </form>
       
    </body>

</html>
