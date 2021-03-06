


<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset='utf-8'>
    <title>回答thanksページ</title>
    <h1>ご入力ありがとうございました。</h1>
</head>
<body>
    <a href='index.php'>トップページへ戻る</a>
<?php
    session_start();
    //配列データをDB格納用に処理。
    $interestForDB = serialize($_SESSION['interest']);
    $languageForDB = serialize($_SESSION['language']);
    $futureForDB = serialize($_SESSION['future']);
    $drinkingDayForDB = serialize($_SESSION['drinkingDay']);

    //入力されたデータをDBに送信。
    $pdo = new PDO('mysql:dbname=gs_db;host=localhost','root','');
    $stmt = $pdo->query('SET NAMES utf8');
    $stmt = $pdo->prepare("INSERT INTO student_info (id, name, interest, language, future, drinkingDay, datetime)VALUES(NULL, :a1, :a2, :a3, :a4, :a5, sysdate())");
    $stmt->bindValue(':a1', $_SESSION['name']);
    $stmt->bindValue(':a2', $interestForDB);
    $stmt->bindValue(':a3', $languageForDB);
    $stmt->bindValue(':a4', $futureForDB);
    $stmt->bindValue(':a5', $drinkingDayForDB);

    $status = $stmt->execute();
    if($status==false){
    echo "SQLエラー";
    exit;
    }else{
    exit;
    }
?>

</body>
</html>

