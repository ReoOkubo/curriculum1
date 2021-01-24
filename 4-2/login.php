<?php
require_once('db_connect.php');

session_start();


if (!empty($_POST)) {
    
    if (empty($_POST["name"])) {
        echo "名前が未入力です。";
    }
    
    if (empty($_POST["password"])) {
        echo "パスワードが未入力です。";
    }

   
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $pass = htmlspecialchars($_POST['password'], ENT_QUOTES);
      
        $pdo = db_connect();
        try {
            
            $sql = "SELECT * FROM user WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }

        
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            if (password_verify($pass, $row['password'])) {
                
                $_SESSION["password"] = $row['password'];
                $_SESSION["user_name"] = $row['name'];
                
                header("Location: main.php");
                exit;
            } else {
            
                echo "パスワードに誤りがあります。";
            }
        } else {
            
            echo "ユーザー名かパスワードに誤りがあります。";
        }
    }
}
?>
<!doctype html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ログインページ</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <h2>ログイン画面</h2>
        <a href="signUp.php"> 新規ユーザー登録</a>
        <form method="post" action="" class="form">
         <input class="input" type="text" name="name" placeholder="ユーザー名" size="15"><br><br>
         <input class="input" type="password" name="password" placeholder="パスワード" size="15"><br><br>
         <input class="login" type="submit" value="ログイン">
        </form>
    </body>
</html>