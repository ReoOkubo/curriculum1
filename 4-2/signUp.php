<?php 
    require_once 'db_connect.php';
    $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', 'localhost', 'yigroupblog');
    
    if(isset($_POST["signUp"])){
        $sql = "INSERT INTO user(name, password) VALUES (:name, :password)";
        $pdo = db_connect();
        $password = $_POST["password"];
        $username = $_POST["name"];
        try {
            $stmt = $pdo->prepare($sql);
            
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

           
            $stmt->bindValue(':password', $password_hash);
            $stmt->bindValue(':name', $username);
            $stmt->execute();
            $userid = $pdo->lastinsertid(); 
           
            header("Location: main.php");
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
    <link rel="stylesheet" type="text/css" href="signUp.css?v=2">
</head>
<body>
    <h2>ユーザー登録画面</h2>
    <form method="POST" action="" class="form">
        <input class="input" type="text" name="name" id="name" placeholder="ユーザー名">
        <br><br>
        <input class="input" type="password" name="password" id="password" placeholder="パスワード"><br><br>
        <input class="login" type="submit" value="新規登録" id="signUp" name="signUp">
    </form><br><br>
    <form class="submit" action="Login.php">
            <input class="return" type="submit" value="戻る">
    </form>
</body>
</html>