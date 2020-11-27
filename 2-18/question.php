<link rel="stylesheet" href="style.css">
<?php
$my_name = $_POST['my_name'];
$num = ["80", "22", "20", "21"];
$lang = ['PHP', 'Python', 'JAVA', 'HTML'];
$com = ['join', 'select', 'insert', 'update'];
$num_answer = "80";
$lang_answer = 'PHP';
$com_answer = 'select';
?>
<p class="result">お疲れ様です<?php echo $my_name ?>さん</p>

<form action = "answer.php" method = "post"> 
<h2>①ネットワークのポート番号は何番？</h2>

<?php foreach($num as $value) {?>
<input  class = "radio" type="radio" name="number" value="<?php echo $value; ?>"/><font color="white"><?php echo $value?></font>
<?php } ?>

<h2>②Webページを作成するための言語は？</h2>

<?php foreach($lang as $value) {?>
<input  type="radio" name="language" value="<?php echo $value; ?>"/><font color="white"><?php echo $value?></font>
<?php } ?>

<h2>③MySQLで情報を取得するためのコマンドは？</h2>

<?php foreach($com as $value) {?>
<input type="radio" name="command" value="<?php echo $value; ?>"/><font color="white"><?php echo $value?></font>
<?php } ?>


<input type = "hidden" name = "my_name"  value = "<?php echo $my_name; ?>"/>
<input type = "hidden" name = "num_answer"  value = "<?php echo $num_answer; ?>"/>
<input type = "hidden" name = "lang_answer"  value = "<?php echo $lang_answer; ?>"/>
<input type = "hidden" name = "com_answer"  value = "<?php echo $com_answer; ?>"/>
<br>
<br>
<input type="submit" value="回答する"/>
</form>