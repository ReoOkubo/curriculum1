<?php
$sum = 0;
$n = 0;
while($sum <= 40){
$rd = rand(1, 6);
 $sum = $sum + $rd;
 $n ++;
 print $n.'回目＝'.$rd;
 print '<br>';
}
echo '合計'.$n.'回でゴールしました。';
echo '<br>';
echo '<br>';
?>

<?php
$time = date("H時", time());
if($time < 12){
    echo '今'.$time.'台です';
    echo '<br>';
    echo 'おはようございます';
}elseif($time < 18 && 12 < $time){
    echo '今'.$time.'台です';
    echo '<br>';
    echo 'こんにちは';
}else{
    echo '今'.$time.'台です';
    echo '<br>';
    echo 'こんばんは';
}
?>

 