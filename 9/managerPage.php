

<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset='utf-8'>
    <title>管理画面</title>
    <h1>管理画面</h1>

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

    echo '<p>名前：'.$_SESSION['name'].'</p>';

////名前と管理者名の表示
//if( $_SESSION['kanri_flg']==1 ) {
//  echo  '<p>権限：管理者</p>';
//}else if( $_SESSION['kanri_flg']==0 ){
//  echo '<p>権限：一般</p>';
//}

?>

</head>
<body>
<ul>
    <li><a href="timeline.php">タイムライン</a></li>
    <li><a href="basicInfo.php">基本情報入力</a>    <li><a href="myTimeline.php">マイタイムライン</a></li>
</li>
</ul>

<ul>
    <li><a href="message.php">メッセージ</a></li>
    <li><a href="board.php">掲示板</a></li>
</ul>

<ul>
    <li><a href="roomCreation.php">部屋作成・修正</a></li>
    <li><a href="seatAllocation.php">席決め・修正</a></li>
    <li><a href="activityCreation.php">活動作成・修正</a></li>
    <li><a href="questionnaireCreation.php">アンケート作成・修正</a></li>
    <li><a href="room.php">ルーム</a></li>
    <li><a href="similarityCheck.php">似た者探し</a></li>
</ul>
    <input type='submit' id='logout_btn' value='ログアウト' onclick='location.href="logout.php"'>

</body>
</html>

