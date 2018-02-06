<?php 
//fixed array = массив фикторованной длинны

$start = memory_get_usage();
$array = range(1, 100000);
echo memory_get_usage() - $start.' bytes<br>';
unset($array);
echo '--------------------------<br>   ';
$start = memory_get_usage();
$array = new SplFixedArray(100000);
for($i = 0; $i<100000; $i++)
	$array[$i] = $i;

echo memory_get_usage() - $start.' bytes<br>';
// порівнюєм затрачення памяті від стандартного массива і від фіксованої довжини
?>