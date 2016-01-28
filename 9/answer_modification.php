




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

    getData('interest', $_SESSION['name'], $interest);
    $interestArray = unserialize($interest[0]);
    getData('language', $_SESSION['name'], $language);
    $languageArray = unserialize($language[0]);
    getData('future', $_SESSION['name'], $future);
    $futureArray = unserialize($future[0]);
    
    $formInterestLength = count($interestToHuman)+count($interestToThings)+count($interestToMoney)+count($interestToOthers);
    $formLanguageLength = count($interestToFrontLang)+count($interestToBackLang)+count($interestToPhoneLang);
    $formFutureLength = count($futureOb);
    
    $formLength = [$formInterestLength, $formLanguageLength, $formFutureLength];

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

//DBから取り出した情報を元に、回答修正ページのチェックボックスにチェックを入れる関数。
//pending：phpで関数を作ってJSでは呼び出しのみにする。
function getSelected(){
    //DBから取り出した情報をPHPから取得する。
    var interestArray = <?php echo json_encode($interestArray, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    var languageArray = <?php echo json_encode($languageArray, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    var futureArray = <?php echo json_encode($futureArray, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    var formLength = <?php echo json_encode($formLength, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    
    //繰り返し用の変数を作成。2段階の繰り返しがあり、2段階目で全てのINPUT要素を確認して、DBの情報と合致した場合にCHECKEDにする。
    var allArray = [interestArray, languageArray, futureArray];
    var nameArray = ['interest', 'language', 'future'];
    var allCount=allArray.length;
    
    //1段目（興味のある対象など）のレベルの繰り返し。
    for (var i=1;i<=allCount;++i){
        var count = allArray[i-1].length;

        //2段目（ヒト、モノなど）のレベルの繰り返し。
        for (j=1;j<=count;++j){
            var formlength = formLength[i-1];
            var dbVal = allArray[i-1][j-1];
            //formの値とdbValとの比較。
            for (k=1;k<=formlength;++k){
                var formid = nameArray[i-1] + k;
                var formVal = document.getElementById(formid).value;
                var formHtml = document.getElementById(formid).outerHTML;
                //一致した場合にチェックを入れる。
                if (dbVal==formVal){
                    console.log(dbVal);
                    document.getElementById(formid).outerHTML = formHtml.replace('>',' checked>');
                }                
            }
        }
    }
}

</script>

<input type='button' onClick='location.href="questionnaire.php"' value='削除'>

</body>
</html>



