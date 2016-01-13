
<!--
回答している場合はアンケート入力thanks＋アンケート回答確認indexを表示。ページにつなぐかは要考察。
回答していない場合はアンケートを表示。名前はfacebook認証のデータを基に自動で埋め込み。
answer_confirmationに遷移。
-->


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset='utf-8'>
<title>アンケート入力ページ</title>
<h1>アンケート入力ページ</h1>
</head>
<body>
<form action='answer_confirmation.php' method='get'>
    名前　　　　　：<input type='text' name='name'></input>
    <p></p>
<!--質問が多すぎるので省略。
    趣味　　　　：<input type='checkbox' name='hobby1' value='野球'>
    <input type='checkbox' name='hobby2' value='サッカー'>
    <input type='checkbox' name='hobby3' value='バスケットボール'>
    <input type='checkbox' name='hobby4' value='テニス'>
    <input type='checkbox' name='hobby5' value='その他スポーツ'>
    <input type='checkbox' name='hobby6' value='旅行・アウトドア'>
見映えをよくするためにspanを入れる
    <span>　　　　</span>
    <input type='checkbox' name='hobby7' value='音楽'>
    <input type='checkbox' name='hobby8' value='映画'>
    <input type='checkbox' name='hobby9' value='美術'>
    <input type='checkbox' name='hobby10' value='その他芸術'>
    <input type='checkbox' name='hobby11' value='ネットサーフィン'><br>
    <span>　　　　</span>
    <input type='checkbox' name='hobby12' value='その他'><br>
-->
    興味のある対象
    <br>
    　　・ヒト　　：
    <input type='checkbox' name='interest1' value='子供'>子供　　
    <input type='checkbox' name='interest2' value='学生'>学生　　
    <input type='checkbox' name='interest3' value='労働者'>労働者　　
    <input type='checkbox' name='interest4' value='労働者'>主婦<br>
    <span>　　　　　　　　</span>
    <input type='checkbox' name='interest5' value='医療・介護'>高齢者　
    <input type='checkbox' name='interest6' value='引きこもり'>引きこもり
    <input type='checkbox' name='interest7' value='ヒトその他'>その他
    <p></p>
    　　・モノ　　：
    <input type='checkbox' name='interest8' value='自然'>自然　　
    <input type='checkbox' name='interest9' value='建築'>建築　　
    <input type='checkbox' name='interest10' value='車'>車　　　　
    <input type='checkbox' name='interest11' value='インテリア・家電'>インテリア・家電<br>
    <span>　　　　　　　　</span>
    <input type='checkbox' name='interest12' value='服'>服　　　
    <input type='checkbox' name='interest13' value='食'>食　　　
    <input type='checkbox' name='interest14' value='モノその他'>その他
    <p></p>
    　　・カネ　　：
    <input type='checkbox' name='interest15' value='投資'>投資　　
    <input type='checkbox' name='interest16' value='貯蓄'>貯蓄　　
    <input type='checkbox' name='interest17' value='カネその他'>その他
    <p></p>
    　　・娯楽　　：
    <input type='checkbox' name='interest18' value='メディア'>メディア
    <input type='checkbox' name='interest19' value='スポーツ'>スポーツ
    <input type='checkbox' name='interest21' value='アート（映像・音楽含む）'>アート（映像・音楽含む）<br>
    <span>　　　　　　　　</span>
    <input type='checkbox' name='interest22' value='娯楽その他'>その他
    <p></p>
    興味のある言語<br>
    　　・フロント： <input type='checkbox' name='language1' value='HTML, CSS'>HTML, CSS
    <input type='checkbox' name='language2' value='JavaScript(フロント側)'>JavaScript
    <input type='checkbox' name='language3' value='フロントその他'>その他
    <p></p>
    　　・バック　：
    <input type='checkbox' name='language4' value='PHP'>PHP　　　
    <input type='checkbox' name='language5' value='Java'>Java　　　
    <input type='checkbox' name='language6' value='Ruby(Rails含む)'>Ruby(Rails含む)<br>
    <span>　　　　　　　　</span>
    <input type='checkbox' name='language7' value='Python'>Python　　
    <input type='checkbox' name='language8' value='Node.js'>Node.js　　
    <input type='checkbox' name='language9' value='Scala'>Scala<br>
    <span>　　　　　　　　</span>
    <input type='checkbox' name='language10' value='C++'>C++　　　
    <input type='checkbox' name='language11' value='バックその他'>その他
    <p></p>
    　　・スマホ　：
    <input type='checkbox' name='language12' value='Java'>Java　　　
    <input type='checkbox' name='language13' value='Swift'>Swift　　　
    <input type='checkbox' name='language14' value='Swift'>JavaScript　
    <input type='checkbox' name='language15' value='スマホその他'>その他
    <p></p>
    今後の進路　　： <input type='checkbox' name='future1' value='起業'>起業　
    <input type='checkbox' name='future2' value='エンジニア転職'>エンジニア転職　
    <input type='checkbox' name='future3' value='特になし'>特になし　
    <input type='checkbox' name='future4' value='秘密・その他'>秘密・その他
    <p></p>
    新年会希望日　： <input type='checkbox' name='drinkingDay1' value='1/23'>1/23(土)　
    <input type='checkbox' name='drinkingDay2' value='1/30'>1/30(土)　
    <input type='checkbox' name='drinkingDay3' value='2/6'>2/6(土)　
    <input type='checkbox' name='drinkingDay4' value='2/13'>2/13(土)
    <p></p>
    <span>　　　　　　　　</span>
    <input type='submit'></input>
</form>
</body>
</html>



