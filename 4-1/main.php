<?php
// セッション開始
require_once ('function.php');
require_once 'db_connect.php';
// セッションにuser_nameの値がなければlogin.phpにリダイレクト
check_user_logged_in();

try {
    $sql = 'SELECT * FROM posts ORDER BY id DESC';
    $pdo = db_connect();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}catch (PDOException $e) {
    $errorMessage = 'データベースエラー';
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>メイン</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
</head>
<body>
    <h1>メインページ</h1>
    <p>ようこそ<?php echo $_SESSION["user_name"]; ?>さん</p>
    <a href="logout.php">ログアウト</a>
    <a href="create_post.php">記事投稿！</a>
    <br />
 <table>
    <tr>
        <td>記事ID</td>
        <td>タイトル</td>
        <td>本文</td>
        <td>投稿日</td>
        <td></td>
        <td></td>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><a href="edit_post.php?id=<?php echo $row['id']; ?>">編集</a></td>
            <td><a href="delete_post.php?id=<?php echo $row['id']; ?>">削除</a></td>
            <td><a href="detail_post.php?id=<?php echo $row['id']; ?>">詳細</a></td>
        </tr>
    <?php } ?>
 </table>
</body>
</html>