
<html>
<head>
<meta charset="utf-8">
<title>表示ページ</title>
<h1>表示ページ</h1>
</head>
<body>
<?php
    $userFormFile = fopen("data/data.csv", "r");
    flock($userFormFile, LOCK_SH);			       echo '<table border="1">'.PHP_EOL;
    echo "<tr>".PHP_EOL;
    echo "<tr>名前</tr>".PHP_EOL;
    echo "<tr>Eメール</tr>".PHP_EOL;
    echo "<tr>年齢</tr>".PHP_EOL;
    echo "<tr>性別</tr>".PHP_EOL;
    echo "<tr>趣味１</tr>".PHP_EOL;
    echo "<tr>趣味２</tr>".PHP_EOL;
    echo "<tr>趣味３</tr>".PHP_EOL;
    
    while(($array = fgetcsv($userFormFile))){
        for($i=0;$i=<$array;$i++){
            for($j=0;$j=<11;$j++){
                echo "<tr><td>".$array[j];
                echo "</tr></td>";
            }
            echo PHP_EOL;
        }
        echo '</table>';
    }

    flock($userFormFile, LOCK_UN);
    fclose($userFormFile);
?>

<a href="index.php">トップページへ戻る</a>
</body>
</html>



