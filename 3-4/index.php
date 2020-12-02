<?php 
require ('getData.php');
$getData = new getData();
$user =$getData->getUserData();
$post =$getData->getPostData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "style.css"/>
</head>
<body>
    <div class="wrapper">
   <div class="header">  
    <img src="yilogo.png">
    <div class="header-top"><p class="right">ようこそ<?php echo $user['last_name']; echo $user['first_name']; ?>さん</p></div>
    <div class="header-bottom"><p class="right">最終ログイン日：<?php echo $user['last_login'];?></p></div>
   </div>
   <table border="1">
    <tr>
     <th>記事ID</th>
     <th>タイトル</th>
     <th>カテゴリ</th>
     <th>本文</th>
     <th>投稿日</th>
    </tr>
    <?php while($row =$post->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
     <td><?php echo $row['id'];?></td>
     <td><?php echo $row['title'];?></td>
     <td><?php if($row['category_no']=='1'){
                echo '食事';
                }elseif($row['category_no']=='2'){
                echo '旅行';
                }else{
                echo 'その他';
                }?></td>
     <td><?php echo $row['comment']; ?></td>
     <td><?php echo $row['created']; ?></td>
    </tr>
<?php }?>
   </table>
   <div class = "footer">
   Y&I group.inc
   </div>
 </div>
</body>
</html>