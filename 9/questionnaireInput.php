

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset='utf-8'>
<title>興味入力ページ</title>
    <h1>興味入力ページ</h1>
    <!--回答後は回答確認ページ（answer_confirmation.php）へ移動。-->
</head>
<body>
<form action='answer_confirmation.php' method='get' name='questionnaire'>
    名前：<input type='text' id='nameBox' name='name'><br>
<?php
    session_start();
    echo '<span>興味のある対象</span><br>';
    $interestOb = ['ヒト', 'モノ', 'カネ', '娯楽'];
    $interestToHuman = ['子供', '学生', '労働者', '主婦', '高齢者', '引きこもり', 'その他'];
    $interestToThings = ['自然', '建築', '車', 'インテリア・家電', '服', '食', 'その他'];
    $interestToMoney = ['投資', '貯蓄', 'その他'];
    $interestToOthers = ['メディア', 'スポーツ', '車', 'アート（映像・音楽含む）', 'その他'];
    echo '<span>・'.$interestOb[0].'</span>';
    arrayToForm($interestToHuman, 'interest', 0);
    echo '<span>・'.$interestOb[1].'</span>';
    arrayToForm($interestToThings, 'interest', count($interestToHuman));
    echo '<span>・'.$interestOb[2].'</span>';
    arrayToForm($interestToMoney, 'interest', count($interestToHuman)+count($interestToThings));
    echo '<span>・'.$interestOb[3].'</span>';
    arrayToForm($interestToOthers, 'interest', count($interestToHuman)+count($interestToThings)+count($interestToMoney));

    echo '<span>興味のある言語</span><br>';
    $interestLang = ['フロント', 'バック', 'スマホ'];
    $interestToFrontLang = ['HTML, CSS', 'JavaScript', 'その他'];
    $interestToBackLang = ['PHP', 'Java', 'Ruby(Rails含む)', 'Python', 'Node.js', 'Scala', 'C++', 'その他'];
    $interestToPhoneLang = ['Java', 'Swift', 'JavaScript', 'その他'];
    echo '<span>・'.$interestLang[0].'</span>';
    arrayToForm($interestToFrontLang, 'language', 0);
    echo '<span>・'.$interestLang[1].'</span>';
    arrayToForm($interestToBackLang, 'language', count($interestToFrontLang));
    echo '<span>・'.$interestLang[2].'</span>';
    arrayToForm($interestToPhoneLang, 'language', count($interestToFrontLang)+count($interestToBackLang));
    
    echo '<span>今後の進路</span><br>';
    $futureOb = ['起業', 'エンジニア転職', '特になし', '秘密・その他'];
    arrayToForm($futureOb, 'future', 0);

    //配列からフォームを生成する関数。
function arrayToForm($array, $name, $number){
    $count = count($array);
    for ($i=1;$i<=$count;++$i){
        echo '<input type="checkbox" id="'.$name.($i+$number).'" name="'.$name.($i+$number).'" value='.$array[$i-1].'>'.$array[$i-1];
    }
    echo '<br>';
}
?>
        
    <input type='submit'>
</form>
</body>
</html>



