
<!--ログイン処理を実施。loginFormから遷移。-->
<?php
session_start();
include_once('../func.php');

//DB接続
try {
    $pdo = new PDO('mysql:dbname=temporarySNS;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

//クエリの準備
$loginQuery = $pdo->query('SET NAMES utf8');
if (!$loginQuery) {
    $error = $pdo->errorInfo();
    exit($error[2]);
}
var_dump($loginQuery);

$loginQuery = $pdo->prepare("SELECT * FROM user WHERE firstName=:userName AND password=:password");
$loginQuery->bindValue(':userName', $_POST['usernameForm']);
$loginQuery->bindValue(':password', $_POST['passwordForm']);


//クエリを実行し、データを取得
$res = $loginQuery->execute();
if($res==false){
    $error = $loginQuery->errorInfo();
    exit("QueryError:".$error[2]);
}
//$count = $loginQuery->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $loginQuery->fetch(); //1レコードだけ取得する方法

//sessionに値を導入
if( $val['userId'] != '' ){
    loginSessionSet($val, 'ssid', 'userName', 'permission');
    if( $_SESSION['permission']){
//        //To do：ルーティング
//        header("Location: ../managerPage.php");
//    }
//    else if( $_SESSION['kanri_flg']=0){
//        //To do：ルーティング
        header("Location: ../userPage.php"); 
    }
}else{
    //値がない場合はlogout処理を経由して前画面へ
    header("Location: logout.php");
}

exit();


?>

