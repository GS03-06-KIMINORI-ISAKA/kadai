


<!--アンケート入力ページ及び似た者探しページへの遷移用。-->
<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset='utf-8'>
    <title>Topページ</title>
    <h1>Emergence</h1>

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

//名前と管理者名の表示
if( $_SESSION['kanri_flg']==1 ) {
  echo  '<p>権限：管理者</p>';
}else if( $_SESSION['kanri_flg']==0 ){
  echo '<p>権限：一般</p>';
}

?>

</head>
<body>
    <li><a href="questionnaire.php">興味入力</a> </li>
    <li><a href="answer.php">似た者探し</a></li>
    </ul>
    <input type='submit' id='logout_btn' value='ログアウト' onclick='location.href="logout.php"'>

</body>
</html>

