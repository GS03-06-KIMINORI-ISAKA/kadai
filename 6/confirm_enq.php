

<html>
<head>
<meta charset='utf-8'>
<title>アンケート入力確認ページ</title>
<h1>アンケート入力確認ページ</h1>
</head>
<body>
<?php
    //入力した値の格納。
    $name = $_GET['name'];
    $mailAddress = $_GET['mailAddress'];
    $age = $_GET['age'];
    $gender = $_GET['gender'];
    //趣味のみ複数選択なので、後で格納。
    $hobby = array();
?>
<!--入力フォームのデータの出力。エラーチェックのために下記の関数を使用しました。-->
名前：<?php echoWithValidation($name); ?>
Eメール：<?php echoWithValidation($mailAddress); ?>
年齢：<?php echoWithValidation($age); ?>
性別：<?php echoWithValidation($gender); ?>
<!--趣味に対してはエラーチェックはしない（入力がなくともエラーとしない）。-->
趣味：<?php 
        for($i = 1; $i<=12; ++$i){
            $hobbyNum=  'hobby'.$i;
            if(isset($_GET[$hobbyNum]) && $_GET[$hobbyNum]){
                echo $_GET[$hobbyNum];
                echo '<br/>';
                //csvへの出力のために配列にする。
                $hobby[]= $_GET[$hobbyNum];
            }
        }
    ?>
<?php
    //csvへの出力。
    $userFormFile = fopen('data/data.csv','a');
    flock($userFormFile, LOCK_EX);
    fputs($userFormFile, $name.','.$mailAddress.','.$age.','.$gender.',');
    fputcsv($userFormFile, $hobby);
    fputs($userFormFile, PHP_EOL);
    flock($userFormFile, LOCK_UN);
    fclose($userFormFile);

    //きちんとフォームに値が記入されているかを確認する関数。
    function echoWithValidation($value){
        if($value==''){
            $errorMessage = 'エラー：値を入力してください。';
            echo $errorMessage;
            echo '<br/>';
        } else {
            echo $value;
            echo '<br/>';
        }
    }
    
?>
<input type='submit' onClick='location.href="input_finish.php"'>
<input type='button' onClick='location.href="input_enq.php"' value='戻る'></input>
</body>
</html>
