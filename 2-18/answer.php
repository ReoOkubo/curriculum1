<link rel="stylesheet" href="style.css">
<?php 

$my_name = $_POST['my_name'];
$num_select = $_POST['number'];
$lang_select = $_POST['language'];
$com_select = $_POST['command'];
$num_answer = $_POST['num_answer'];
$lang_answer = $_POST['lang_answer'];
$com_answer = $_POST['com_answer'];

function reaction($select,$answer){
    if($select==$answer){
        return '正解！';
    }else{
        return '残念・・・';
    }
}
?>
<p class="result"><?php echo $my_name?>さんの結果は・・・？</p>
<p>①の答え</p>

<?php 
$select = $num_select;
$answer = $num_answer;
?>
<p><?php echo reaction($select, $answer) ?></p>
<p>②の答え</p>

<?php
$select = $lang_select;
$answer = $lang_answer;
?> 
<p><?php echo reaction($select, $answer) ?></p>
<p>③の答え</p>

<?php 
$select = $com_select;
$answer = $com_answer;
?>
<p><?php echo reaction($select, $answer) ?></p>