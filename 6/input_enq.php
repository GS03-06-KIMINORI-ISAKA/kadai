

<html>
<head>
<meta charset='utf-8'>
<title>アンケート入力ページ</title>
<h1>アンケート入力ページ</h1>
</head>
<body>
<form action='confirm_enq.php' method='get'>
    名前　 ：<input type='text' name='name'></input><br>
    Eメール：<input type='text' name='mailAddress'></input><br>
    年齢　 ：<input type='text' name='age'></input><br>
<!--ラジオボタン-->
    性別　 ：<input type='radio' name='gender' value='男'>男</input>
    <input type='radio' name='gender' value='女'>女</input>
    <input type='radio' name='gender' value='その他'>その他</input><br>
<!--チェックボックス-->
    趣味　 ：<input type='checkbox' name='hobby1' value='運動'>運動</input>
    <input type='checkbox' name='hobby2' value='アウトドア'>アウトドア</input>
    <input type='checkbox' name='hobby3' value='買い物'>買い物</input>
    <input type='checkbox' name='hobby4' value='街散策'>街散策</input>
    <input type='checkbox' name='hobby5' value='旅行'>旅行</input><br>
<!--見映えをよくするためにspanを入れる-->
    <span>　　　　</span>
    <input type='checkbox' name='hobby6' value='スポーツ観戦'>スポーツ観戦</input>
    <input type='checkbox' name='hobby7' value='芸術鑑賞'>芸術鑑賞</input>
    <input type='checkbox' name='hobby8' value='芸術作品作成・実演'>芸術作品作成・実演</input>
    <input type='checkbox' name='hobby9' value='ネットサーフィン'>ネットサーフィン</input><br>
    <span>　　　　</span>
    <input type='checkbox' name='hobby10' value='仕事'>仕事</input>
    <input type='checkbox' name='hobby11' value='その他'>その他</input><br>
    <p></p>
    <span>　   　　　</span>
    <input type='submit'></input>
</form>
</body>
</html>


