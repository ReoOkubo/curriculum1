<?php 
$x = 3.3;
echo ceil($x);
echo '<br>';
echo floor($x);
echo '<br>';
echo round($x);
echo '<br>';

function circleArea($r){
    $circle_area = $r * $r * pi();
    return '円の面積は'.$circle_area.'です';
}
echo circleArea(4);
echo '<br>';
echo mt_rand(1, 50);
echo '<br>';
$message = 'hello';
echo strlen($message);
echo '<br>';
$message = 'こんにちは';
echo mb_strlen($message);
echo '<br>';
$message = 'goodmorning';
echo strpos($message, "d");
echo '<br>';
$message = 'おはようございます';
echo mb_strpos($message, "い");
echo '<br>';
$message = 'good-afternoon';
echo substr($message, -9, 9);
echo '<br>';

$message = 'good-evening';
echo str_replace('evening', 'morning', $message);
echo '<br>';
$name = '田中';
$delay = '15';
$destination = '新宿';

printf("%sさんは%d分遅れて%s駅に到着します。", $name, $delay, $destination);
echo '<br>';
$message = sprintf("%sさんは%d分遅れて%s駅に到着します。", $name, $delay, $destination);
echo $message;
?>