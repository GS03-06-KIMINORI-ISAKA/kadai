








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

    echo '<p>名前：'.$_SESSION['name'].'</p>';

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
    <li><a href="questionnaireSelection.php">アンケート回答</a></li>
    <li><a href="activitySelection.php">活動入力</a></li>
</ul>
<!--
    To do：マイタイムラインへの投稿。
    マイタイムライン投稿：<textarea></textarea>
    <input type='submit' id='mytimelineFromIndex' name='投稿' value='投稿'>
-->
<ul>
    <li><a href="similarityCheck.php">似た者探し</a></li>
</ul>
    <input type='submit' id='logout_btn' value='ログアウト' onclick='location.href="logout.php"'>

</body>
</html>

