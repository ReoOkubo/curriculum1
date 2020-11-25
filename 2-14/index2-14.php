<?php
$fruits = ["apple", "grape", "peach", "orange"];
echo count($fruits);
echo '<br>';
sort($fruits);
var_dump($fruits);
echo '<br>';
if(in_array("apple", $fruits)){
    echo 'りんごはあります';
} else{
    echo 'りんごはありません';
}
echo '<br>';
$atstr = implode(" and ", $fruits);
var_dump($atstr);

echo '<br>';
$re_fruits = explode(" and ", $atstr);
var_dump($re_fruits); 
?>