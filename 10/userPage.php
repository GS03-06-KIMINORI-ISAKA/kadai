


<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset='utf-8'>
    <title>ユーザー画面</title>
    <h1>ユーザー画面</h1>

<?php
session_start();
include_once('func.php');

//セッションチェックとregenerate
if( !isset($_SESSION['ssid']) || ($_SESSION['ssid'] != session_id()) ){
    echo "LOGIN ERROR";
    exit();
}
//セッションハイジャック対策
session_regenerate_id();
$_SESSION['ssid'] = session_id();

    echo '<p>名前：'.$_SESSION['userName'].'</p>';

?>

</head>
<body>
<ul>
    To do：タイムライン表示
<!--    <li><a href="basicInfo.php">基本情報入力</a>    -->
    <li><a href="communiaction%20places/myTimeline.php">マイタイムライン</a></li>
</li>
</ul>

<ul>
    <li><a href="communiaction%20places/message.php">メッセージ</a></li>
    To do：選択式
    <li><a href="communiaction%20places/room.php">ルーム</a></li>
</ul>

<ul>
    <li><a href="basic%20action/questionnaireCreation.php">アンケート作成</a></li>
    <li><a href="basic%20action/questionnaireInput.php">アンケート回答</a></li>
</ul>
<?php
    //DBからアンケートの情報を取り出して表示。
    //To do：リンクの貼り付け及びルーティング。

    //questionnaireテーブルからアンケート名と作成者名を呼び出し。
    $pdo= new PDO('mysql:dbname=temporarySNS;host=localhost','root','');
    $questionnaireQuery=$pdo->query("SET NAMES utf8");
    $questionnaireQuery=$pdo->prepare("SELECT questionnaireName, userId FROM questionnaire WHERE userId=1");

    $status = $questionnaireQuery->execute();
    if($status==false){
        echo "SQLエラー";
        exit;
    }else{
        while ($result=$questionnaireQuery->fetch(PDO::FETCH_ASSOC)){
            echo '<table><tr><th>'.$result['questionnaireName'].'</th><th>'.$result['userId'].'</th></tr></table>';
            echo '<br>';
        }
        exit;
    }
?>
<!--
    To do：マイタイムラインへの投稿。
    マイタイムライン投稿：<textarea></textarea>
    <input type='submit' id='mytimelineFromIndex' name='投稿' value='投稿'>
-->
<ul>
    <li><a href="similarity%20connection/similarityCheck.php">似た者探し</a></li>
</ul>
    <input type='submit' id='logout_btn' value='ログアウト' onclick='location.href="loginout/logout.php"'>

</body>
</html>

