




<!--会員登録ページ。registration.phpで登録処理をしてindexページに遷移-->
<!--To do：会員登録の確認。-->

<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset='utf-8'>
    <title>会員登録ページ</title>
    <h1>会員登録ページ</h1>
</head>
<body>
<!--pending1:DBへの登録＝registration.php。-->
    <form action='registration.php' method='post'>
    <span>ユーザー名：</span><input type='text' id='usernameForm' name='usernameForm'><br>
    <span>パスワード：</span><input type='text' id='passwordForm' name='passwordForm'><br>
    <span>姓：</span><input type='text' id='surnameForm' name='surnameForm'>
    <span>名：</span><input type='text' id='firstnameForm' name='firstnameForm'><br>
    <span>年齢：</span><input type='text' id='age' name='age'><br>
    <input type='submit' id='registration_btn' value='送信'>
    </form>
</body>
</html>

