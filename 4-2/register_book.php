<?php
require_once 'db_connect.php';
$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', 'localhost', 'yigroupblog');
require_once 'function.php';

check_user_logged_in();


if (isset($_POST["post"])) {

    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["date"])) {
        echo '販売日が未入力です。';
    } elseif (empty($_POST["stock"])) {
        echo '在庫数が未記入です。';
    }

    if (!empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["stock"])) {
        
        $title = htmlspecialchars($_POST["title"], ENT_QUOTES);
        $date = htmlspecialchars($_POST["date"], ENT_QUOTES);
        $stock = htmlspecialchars($_POST["stock"], ENT_QUOTES);
        $pdo = db_connect();
        echo $date;
        try {
            
            $sql = "INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)";
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindValue(':title', $title);
            
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':stock', $stock);
            
            $stmt->execute();
            header("Location: main.php");
        } catch (PDOException $e) {
            
                $errorMessage = 'データベースエラー';
            
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="register_book.css?v=3">
</head>
<body>
    <h1>本 登録画面</h1>
    <form method="POST" action="">
        <input type="text" name="title" id="title" placeholder="タイトル" style="width:200px;height:20px;">
        <br>
        <br>
        <input type="date" name="date" id="date" placeholder="発売日 (例) 2020-09-09" style="width:200px;height:20px;"><br>
        <br>
        在庫数<br>
        <select  class="select" name="stock" style="width:200px;height:20px;" >
        <option class="option">選択してください</option>
      <?php for ($i=1;$i<=100;$i++){ ?>
        <option>
          <?php echo $i; ?>
        </option>
      <?php } ?>
    </select><br>
    <br>
        <input class="register" type="submit" value="登録" id="post" name="post" style="width:100px;height:30px;">
    </form>
</body>
</html>