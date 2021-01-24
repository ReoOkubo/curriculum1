<?php
require_once ('function.php');
require_once 'db_connect.php';

check_user_logged_in();

try {
    $sql = 'SELECT * FROM books ORDER BY id ASC';
    $pdo = db_connect();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}catch (PDOException $e) {
    $errorMessage = 'データベースエラー';
    die();
}
?>
<!doctype html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>メイン</title>
    <link rel="stylesheet" type="text/css" href="main.css?v=4">
</head>
<body>
    <h1>在庫一覧画面</h1>
    <a href="register_book.php" class="signUp">新規登録</a>
    <a href="logout.php" class="logout">ログアウト</a>
    <br />
 <table border="1" width="500" height="300" class="table">
    <tr class="title">
        <th>タイトル</th>
        <th>販売日</th>
        <th>在庫数</th>
        <th></th>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr align="center">
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><a class="delete" href="delete_book.php?id=<?php echo $row['id']; ?>">削除</a></td>
        </tr>
    <?php } ?>
 </table>
</body>
</html>