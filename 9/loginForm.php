

<!--トップページに該当。-->
<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset='utf-8'>
    <title>ログインページ</title>
    <h1>ログインページ</h1>
</head>
<body>
<!--    状態によってボタンを隠す。-->
    <form action='loginMethod.php' method='post'>
    <span>ユーザー名</span>：<input type='text' id='usernameForm' name='usernameForm'><br>
    <span>パスワード</span>：<input type='text' id='passwordForm' name='passwordForm'><br>
    <input type='submit' id='login_btn' value='ログイン'>
    </form>
    <input type='submit' id='signin_btn' value='会員登録' onclick='location.href="signin.php"'>
</body>
</html>

