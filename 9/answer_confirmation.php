


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>回答確認ページ</title>
    <h1>回答確認ページ</h1>
    <!--回答に満足しない場合は興味入力ページ（questionnaire.php）へ、満足して送信した後は回答thanksページ（input_finish.php）へ移動。-->
</head>
<body>
<?php
    //入力した値のSESSIONへの格納。配列は枠のみ作成して後で格納。
    session_start();
    $_SESSION['name']= $_GET['name'];
    //複数選択用の数値。
    $interest = 'interest';
    $_SESSION[$interest] = array();
    $language = 'language';
    $_SESSION[$language] = array();
    $future = 'future';
    $_SESSION[$future] = array();
    $drinkingDay = 'drinkingDay';
    $_SESSION[$drinkingDay] = array();
?>
<!--入力フォームのデータの出力１。エラーチェックのために下記の関数を使用。複数入力可能部に対してはエラーチェックはしない（入力がなくともエラーとしない）-->
名前　　　　　：<?php echoWithValidation($_SESSION['name']); ?>
    <p></p>
<!--入力フォームのデータの出力２-->
興味のある対象：
    <br>
    <span>　　　　　　　　</span>
<?php getArray($interest, 22)?>
    <p></p>
興味のある言語：
    <br>
    <span>　　　　　　　　</span>
<?php getArray($language, 15)?>
    <p></p>
今後の進路　　：
    <br>
    <span>　　　　　　　　</span>
<?php getArray($future, 4)?>
    <p></p>
飲み会希望日　：
    <br>
    <span>　　　　　　　　</span>
<?php getArray($drinkingDay, 4)?>
    <p></p>

<?php
    //配列への入力データを格納し、画面に表示する関数。
    function getArray($array, $length){
        for($i = 1; $i<=$length; ++$i){
            $arrayNum=  $array.$i;
            if(isset($_GET[$arrayNum]) && $_GET[$arrayNum]){
                echo $_GET[$arrayNum];
                echo '<br>';
                echo '<span>　　　　　　　　</span>';
                //csvへの出力のために配列にする。
                $_SESSION[$array][]= $_GET[$arrayNum];
            }
        }        
    }
    
    //フォームに値が記入されているかを確認し、記入されている場合にその値を表示し、されていない場合にエラー表示をする関数。
    function echoWithValidation($value){
        if($value==''){
            $errorMessage = 'エラー：値を入力してください。';
            echo $errorMessage;
            echo '<br>';
        } else {
            echo $value;
            echo '<br>';
        }
    }
    
?>
<input type='submit' onClick='location.href="input_finish.php"'>
<input type='button' onClick='location.href="questionnaire.php"' value='戻る'></input>


</body>
</html>



