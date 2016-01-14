


<!DOCTYPE html>
<html lang="ja">    
<head>
    <meta charset="UTF-8">
    <title>似た者探し</title>
    <h1>あなたと趣向が似ている人</h1>
</head>
<body>
<?php
    //回答が同じ人の名前を表示する。下に関数を定義。
    session_start();
    echo '興味のある対象<br>';
    similarityCheck('interest');
    echo '興味のある言語<br>';
    similarityCheck('language');
    echo '今後の進路　　<br>';
    similarityCheck('future');
    echo '飲み会希望日　<br>';
    similarityCheck('drinkingDay');

    //DBから回答が同じ人の名前を探して、表示する関数。
    function similarityCheck($value){
        $count = count($_SESSION[$value]);
        $pdo = new PDO('mysql:dbname=gs_db;host=localhost','root','');
        $stmt = $pdo->query('SET NAMES utf8');
        
        //配列の要素の数だけ処理を繰り返す。
        for($i = 0; $i<=($count-1); ++$i){
            echo '・「'.$_SESSION[$value][$i].'」：<br>';
            //DBから回答が同じ人を探す。
            $stmt = $pdo->prepare("SELECT name FROM student_info WHERE $value Like '%{$_SESSION[$value][$i]}%'");
            $flag = $stmt->execute();
            if($flag==false){
                echo 'SQLエラー';
            }else{
            //該当する人の数だけ処理を繰り返す。
                while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
                    //回答が同じ人の名前を表示する。
                    echo '<span>　　　　　　　</span>'.$result['name'].'<br>';
                }
            }
        }
        //見栄えのための改行。
        echo '<br>';
    }
?>
<a href='index.php'>トップページへ戻る</a>
</body>
</html>



