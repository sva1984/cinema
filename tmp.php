<?php
require "funcs.php";
/**
 * Created by PhpStorm.
 * User: asv
 * Date: 03.08.2019
 * Time: 21:42
 */
$var = 'Hello world';
$arr = (array)$var;
$arr[][]='!';
echo "tryam {$arr[1][0]} tryam".PHP_EOL;
$arr = [1,2,3];
list($one, $two, $thre)=$arr;
echo $one.$two.$thre.PHP_EOL;
//unbug($arr);
$arr = ['one' => 1, 'two' => 2, 'three' => 3];
list($one, $two, $three) = $arr;
echo $one;
$x = 5;
$y = 10;
echo 'x='.$x.'y='.$y.PHP_EOL;
list($x, $y) = [$y, $x];
echo 'x='.$x.'y='.$y.PHP_EOL;


$numbers = [ '1' , '2', '3' ] ;
for ($i = 0; $i < count($numbers); $i++)
{
    echo $numbers[$i].PHP_EOL;
}