


<!--
自分の回答の表示。
回答を修正したい場合に修正する。
アンケートページに戻る。
-->

<!DOCTYPE html>
<html lang="ja">
    
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>POSTデータ登録</title>
</head>
<body>
<?php
    
    session_start();
    similarityCheck('interest');
//名前の場合は別の関数使う必要がありそう。
    
function similarityCheck($value){
    $count = count($_SESSION[$value]);
    $pdo = new PDO('mysql:dbname=gs_db;host=localhost','root','');
    $stmt = $pdo->query('SET NAMES utf8');
    for($i = 0; $i<=($count-1); ++$i){
        $stmt = $pdo->prepare("SELECT name FROM student_info WHERE $value Like '%{$_SESSION[$value][$i]}%'");
        var_dump($stmt);
        $flag = $stmt->execute();

//データ表示
    $view="";
if($flag==false){
    $view = "SQLエラー";
}else{
  //Selectデータの数だけ自動でループしてくれる
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    var_dump($result['name']);
    //5.表示文字列を作成→変数に追記で代入
    $view .= '<p>'.$result['name'].'</p>';       
    var_dump($view);
  }
}
}
}
?>
</body>
</html>



