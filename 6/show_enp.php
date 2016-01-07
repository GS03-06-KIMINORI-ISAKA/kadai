
<html>
<head>
<meta charset='utf-8'>
<title>アンケート表示ページ</title>
<h1>アンケート表示ページ</h1>
</head>
<body>
<?php
    //csvファイルを読み込む。
    $userFormFile = fopen('data/data.csv', 'r');
    flock($userFormFile, LOCK_SH);
    
    //一行目には項目の名称を入れる。
    echo '<table border=\"1\">'.PHP_EOL;
    echo '<tr>'.PHP_EOL;
    echo '<td>名前</td>'.PHP_EOL;
    echo '<td>Eメール</td>'.PHP_EOL;
    echo '<td>年齢</td>'.PHP_EOL;
    echo '<td>性別</td>'.PHP_EOL;
    echo '<td>趣味</td>'.PHP_EOL;
    echo '</tr>';
    
    //二行目以降にファイルの値を入れる。
    while(($userFormArray=fgetcsv($userFormFile))){        
        echo '<tr>'.PHP_EOL;
        for($i=0;$i<=6;$i++){
            //値が入っていない配列に対するエラーの回避。
            if(isset($userFormArray[$i])){
                echo '<td>'.$userFormArray[$i].'</td>'.PHP_EOL;
            } else {
                echo '<td></td>'.PHP_EOL;                 
            }
        }
        echo '</tr>'.PHP_EOL;
    }
    echo '</table>'.PHP_EOL;
    
    //csvファイルを閉じる。
    flock($userFormFile, LOCK_UN);
    fclose($userFormFile);
?>

<a href='index.php'>トップページへ戻る</a>
</body>
</html>



