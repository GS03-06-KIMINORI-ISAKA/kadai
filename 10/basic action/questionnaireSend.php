


<!--作成されたアンケート情報をDBに登録するファイル。-->
<?php
    $q= $_POST['qa'];
    $title= $_POST['qaTitle'];
    $qa=$q[0];
    
    var_dump($qa);

    //questionnaireテーブルとのやりとり。後ほど関数化。
    $pdo= new PDO('mysql:dbname=temporarySNS;host=localhost','root','');
    $questionnaireQuery=$pdo->query("SET NAMES utf8");
    $questionnaireQuery=$pdo->prepare("INSERT INTO questionnaire (userId, questionnaireId, questionnaireName, creationTime)VALUES(:a1, NULL, :a2, :a3)");
    $questionnaireQuery->bindValue(':a1', 1);
    $questionnaireQuery->bindValue(':a2', $title);
    $questionnaireQuery->bindValue(':a3', 1);

    $status = $questionnaireQuery->execute();
    if($status==false){
        echo "SQLエラー";
        exit;
    }else{
        exit;
    }

    //answerテーブルとのやりとり。後ほど関数化。
    $pdo= new PDO('mysql:dbname=temporarySNS;host=localhost','root','');
    $answerquery=$pdo->query("SET NAMES utf8");
    $answerquery=$pdo->prepare("INSERT INTO answer (answerId, userId, questionnaireId, questionType, question, answer, answerTime)VALUES(NULL, :a1, :a2, :a3, :a4, :a5, :a6)");
    $answerquery->bindValue(':a1', 1);
    $answerquery->bindValue(':a2', 1);
    $answerquery->bindValue(':a3', $qa[0]);
    $answerquery->bindValue(':a4', $qa[2]);
    $answerquery->bindValue(':a5', $qa[3]);
    $answerquery->bindValue(':a6', 1);


    $status = $answerquery->execute();
    if($status==false){
        echo "SQLエラー";
        exit;
    }else{
        exit;
    }

?>



