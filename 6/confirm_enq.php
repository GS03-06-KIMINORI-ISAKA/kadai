

<html>
<head>
<meta charset="utf-8">
<title>確認ページ</title>
<h1>確認ページ</h1>
</head>
<body>
<?php
    $name = $_GET["name"];
    $mailAddress = $_GET["mailAddress"];
    $age = $_GET["age"];
    $gender = $_GET["gender"];
    $hobby = array();
?>
名前：<?php 
        if($name){
            echo $name;
            echo <br>
        } else {
            echo "値を入力してください";
            echo <br>            
        }

    ?><br>
Eメール：<?php echo $mailAddress; ?><br>
年齢：<?php echo $age; ?><br>
性別：<?php echo $gender; ?><br>
趣味：<?php 
    for($i=1; $i<=12; ++$i){
        $hobbyNum= "hobby".$i;
        if(isset($_GET[$hobbyNum]) && $_GET[$hobbyNum]){
            echo $_GET[$hobbyNum];
            echo "<br/>";
            $hobby[]= $_GET[$hobbyNum];
        }
//        else{
//            $hobby[$i-1]= "";
//        }
    }
    $userFormFile = fopen("data/data.csv","a");
    flock($userFormFile, LOCK_EX); 
    fputs($userFormFile, $name.",".$mailAddress.",".$age.",".$gender.",");
    fputcsv($userFormFile, $hobby);
    fputs($userFormFile, PHP_EOL);
flock($userFormFile, LOCK_UN);
fclose($userFormFile);
    
    function errorCheck(value){
        
    }

    function echo(value){
        echo 
        
    }
    
    ?>
<input type="submit" onClick="location.href='input_finish.php'"></input>
</body>
</html>


