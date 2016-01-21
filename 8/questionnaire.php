

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
<!--質問が多すぎるので趣味などは省略。質問事項は以下の５つ。
１．名前
２．興味のある対象
３．興味のある言語
４．今後の進路
-->
    名前：<input type='text' id='nameBox' name='name'><br>
<?php
    session_start();
    echo '<span>興味のある対象</span><br>';
    $interestOb = ['ヒト', 'モノ', 'カネ', '娯楽'];
    $interestToHuman = ['子供', '学生', '労働者', '主婦', '高齢者', '引きこもり', 'その他'];
    $interestToThings = ['自然', '建築', '車', 'インテリア・家電', '服', '食', 'その他'];
    $interestToMoney = ['投資', '貯蓄', 'その他'];
    $interestToOthers = ['メディア', 'スポート', '車', 'アート（映像・音楽含む）', 'その他'];
    echo '<span>・'.$interestOb[0].'</span>';
    arrayToForm($interestToHuman, 'interest');
    echo '<span>・'.$interestOb[1].'</span>';
    arrayToForm($interestToThings, 'interest');
    echo '<span>・'.$interestOb[2].'</span>';
    arrayToForm($interestToMoney, 'interest');
    echo '<span>・'.$interestOb[3].'</span>';
    arrayToForm($interestToOthers, 'interest');

    echo '<span>興味のある言語</span><br>';
    $interestLang = ['フロント', 'バック', 'スマホ'];
    $interestToFrontLang = ['HTML, CSS', 'JavaScript', 'その他'];
    $interestToBackLang = ['PHP', 'Java', 'Ruby(Rails含む)', 'Python', 'Node.js', 'Scala', 'C++', 'その他'];
    $interestToPhoneLang = ['Java', 'Swift', 'JavaScript', 'その他'];
    echo '<span>・'.$interestLang[0].'</span>';
    arrayToForm($interestToFrontLang, 'language');
    echo '<span>・'.$interestLang[1].'</span>';
    arrayToForm($interestToBackLang, 'language');
    echo '<span>・'.$interestLang[2].'</span>';
    arrayToForm($interestToPhoneLang, 'language');
    
    echo '<span>今後の進路</span><br>';
    $future = ['起業', 'エンジニア転職', '特になし', '秘密・その他'];
    arrayToForm($future, 'future');

    //pending:iが関数を使うごとに1に戻るため、同じidのものが複数出現。引数に$numberを追加する。
function arrayToForm($array, $name){
    $count = count($array);
    for ($i=1;$i<=$count;++$i){
        echo '<input type="checkbox" id="'.$name.$i.'" name="'.$name.$i.'" value='.$array[$i-1].'>'.$array[$i-1];
    }
    echo '<br>';
}
?>
        
    <input type='submit'>
</form>
</body>
</html>



