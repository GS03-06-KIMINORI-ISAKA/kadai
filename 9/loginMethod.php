
<!--ログイン処理を実施。loginFormから遷移。-->
<?php
session_start();
include_once('func.php');

//DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_db;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

//クエリの準備
$loginQuery = $pdo->query('SET NAMES utf8');
if (!$loginQuery) {
    $error = $pdo->errorInfo();
    exit($error[2]);
}

$loginQuery = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw");
$loginQuery->bindValue(':lid', $_POST['usernameForm']);
$loginQuery->bindValue(':lpw', $_POST['passwordForm']);


//クエリを実行し、データを取得
$res = $loginQuery->execute();
if($res==false){
    $error = $loginQuery->errorInfo();
    exit("QueryError:".$error[2]);
}
//$count = $loginQuery->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $loginQuery->fetch(); //1レコードだけ取得する方法

//sessionに値を導入
if( $val["id"] != "" ){
    loginSessionSet($val, 'ssid', 'name', 'kanri_flg');
    header("Location: index.php");
}else{
    //値がない場合はlogout処理を経由して前画面へ
    header("Location: logout.php");
}

exit();


?>

