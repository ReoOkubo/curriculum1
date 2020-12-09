<?php 
    require 'db_connect.php';
    $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', 'localhost', 'yigroupblog');
    
    if(isset($_POST["signUp"])){
        $sql = "INSERT INTO users(name, password) VALUES (:name, :password)";
        $pdo = db_connect();
        $password = $_POST["password"];
        $username = $_POST["name"];
        try {
            $stmt = $pdo->prepare($sql);
            
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // :passwordにバインドする場合は、$password_hashを使用する
            $stmt->bindValue(':password', $password_hash);
            $stmt->bindValue(':name', $username);
            $stmt->execute();
            $userid = $pdo->lastinsertid(); 
             // 登録した(DB側でauto_incrementした)IDを$useridに入れる
            echo '登録が完了しました。あなたの登録IDは ' . $userid . ' です。パスワードは ' . $password . ' です。';  // ログイン時に使用するIDとパスワード
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            die();
        }
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>新規登録</h1>
    <form method="POST" action="">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp">
    </form>
</body>
</html>