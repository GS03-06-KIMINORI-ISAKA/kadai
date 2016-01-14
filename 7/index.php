



loginされてるかどうかでページの表示を変更。loginされている場合はアンケートと出席ページへのリンクを表示。
されてなければfacebook認証してからアンケートindexページに。


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Topページ</title>
</head>
<body>
    <ul>
    <li><a href="questionnaire.php">アンケート入力</a> </li>
    <li><a href="answer.php">アンケート表示</a></li>
    </ul>
</body>
</html>