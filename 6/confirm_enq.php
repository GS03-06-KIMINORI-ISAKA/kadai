

<html>
<head>
<meta charset="utf-8">
<title>確認画面</title>
<h1>確認画面</h1>
</head>
<body>
名前：<?php echo $_GET["name"] ?><br>
Eメール：<?php echo $_GET["mailAdress"] ?><br>
年齢：<?php echo $_GET["age"] ?><br>
性別：<?php echo $_GET["gender"] ?><br>
趣味：<?php 
    for($i=1; $i<=12; ++$i){
        $hobbyNum= "hobby".$i;
        if(isset($_GET[$hobbyNum]) && $_GET[$hobbyNum]){
        echo $_GET[$hobbyNum];
        echo "<br/>";
        }
    }
    ?>
<input type="submit" action="input_finish.php" method="post"></input>
</body>
</html>


