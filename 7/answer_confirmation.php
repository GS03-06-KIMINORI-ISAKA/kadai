


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
</head>
<body>
<?php
    //入力した値の格納。
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
<!--入力フォームのデータの出力。エラーチェックのために下記の関数を使用しました。-->
名前　　　　　：<?php echoWithValidation($_SESSION['name']); ?>
    <p></p>
<!--複数入力可能部に対してはエラーチェックはしない（入力がなくともエラーとしない）。-->
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
新年会希望日　：
    <br>
    <span>　　　　　　　　</span>
<?php getArray($drinkingDay, 4)?>
    <p></p>

<?php
    //配列の格納のための関数を作成。
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
    
    //きちんとフォームに値が記入されているかを確認する関数。
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



