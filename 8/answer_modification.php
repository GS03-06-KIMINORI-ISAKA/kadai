




<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>回答修正ページ</title>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>
<?php
    include_once('questionnaire.php');
    $interest = array();
    $language = array();
    $future = array();
    $_SESSION['name']='Aさん';

    getData('interest', $_SESSION['name'], $interest);
    $interestArray = unserialize($interest[0]);
    getData('language', $_SESSION['name'], $language);
    $languageArray = unserialize($language[0]);
    getData('future', $_SESSION['name'], $future);
    $futureArray = unserialize($future[0]);

function getData($obSearched, $personName, &$obStored){
    $pdo = new PDO('mysql:dbname=gs_db;host=localhost','root','');
    $answerQuery = $pdo->query('SET NAMES utf8');
    $answerQuery = $pdo->prepare("SELECT $obSearched FROM student_info WHERE name = '$personName'");
    $flag = $answerQuery->execute();
        if($flag==false){
            echo 'SQLエラー';
        }else{
            while($result= $answerQuery->fetch(PDO::FETCH_NUM)){
                $obStored=$result;
            }
        }
    }
?>
<script type="text/javascript">
$(document).ready(function(){
 
    getSelected();
});

//PENDING：DBから取り出した情報を元に、回答修正ページのチェックボックスにチェックを入れる関数。
function getSelected(){
    //DBから取り出した情報をPHPから取得する。
    var interestArray = <?php echo json_encode($interestArray, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    var languageArray = <?php echo json_encode($languageArray, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    var futureArray = <?php echo json_encode($futureArray, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    
    //繰り返し用の変数を作成。2段階の繰り返しがあり、2段階目で全てのINPUT要素を確認して、DBの情報と合致した場合にCHECKEDにする。
    var allArray = [interestArray, languageArray, futureArray];
    var nameArray = ['interest', 'language', 'future'];
    var maxArray = [22, 15, ];
    var allCount=allArray.length;
    
    //1段目（興味のある対象など）レベルの繰り返し。
    for (var i=1;i<=allCount;++i){
        var count = allArray[i-1].length;
        //2段目（ヒト、モノなど）レベルの繰り返し。
        for (j=1;j<=count;++j){
            //PENDING：全てのINPUT要素を確認して、DBの情報と合致した場合にCHECKEDにする。
//            var id = '#' + nameArray[i-1] + j;
//            var formHtml = $(id).val();
//
//            for(k=1;k<=count;++k){
//                var temp = document.getElementById('interest2');
//                
//            }
        }
    }
//以下は関数を作る前に普通の数値で試した際の残骸。
//        if (array[0]==formHtml){
//            temp.outerHTML = '<input type="checkbox" id="interest2" name="interest2" value="学生" checked>';
//        }
//    }
}

//趣味別に取ってくれば、それに応じて趣味のやつを探して
//それか配列作って一つずつ調べるか。でも趣味別に取るのが正解かと。関数作る。
</script>

<input type='button' onClick='location.href="questionnaire.php"' value='削除'>

</body>
</html>



