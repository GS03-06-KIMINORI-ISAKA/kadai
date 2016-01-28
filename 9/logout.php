

<!--ログアウト処理。ログイン失敗時及びログアウト押下時に遷移-->
<?php
session_start();

//SESSIONを初期化
$_SESSION = array();

//Cookieとサーバに保存してあるSESSIONIDを破棄
if (isset($_COOKIE[session_name()])) { //session_name()は、セッションID名を返す関数
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

header("Location: loginForm.php");
exit();

?>

