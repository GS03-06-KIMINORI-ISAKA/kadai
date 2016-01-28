

<!--会員登録処理。成功した場合はindexページに遷移-->
<?php
    session_start();
    $_SESSION['name']=$_POST['surnameForm'].$_POST['firstnameForm'];
    $_SESSION['lid']=$_POST['usernameForm'];
    $_SESSION['lpw']=$_POST['passwordForm'];
    $_SESSION['ssid']=session_id();
    $_SESSION['kanri_flg']=0;
    $_SESSION['life_flg']=1;
    
try{
    $pdo=new PDO('mysql:dbname=gs_db;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('データベースに接続できません'.$e->getMessage());
}

    $regiQuery = $pdo->query('SET NAMES utf8');
    if(!$regiQuery){
        $error=$pdo->errorInfo();
        exit('charError').$error[2];
    }

    $regiQuery = $pdo->prepare("INSERT INTO gs_user_table (id, name, lid, lpw, kanri_flg, life_flg) VALUES(NULL, :a1, :a2, :a3, 0, 1)");
    $regiQuery->bindValue(':a1', $_SESSION['name']);
    $regiQuery->bindValue(':a2', $_SESSION['lid']);
    $regiQuery->bindValue(':a3', $_SESSION['lpw']);
    var_dump($regiQuery);
    
    $insertToDb = $regiQuery->execute();
    if($insertToDb==false){
        echo "SQLエラー";
        exit;
    }else{
        header("Location: index.php");
        exit;
    }

?>

