<?php 
function setup($x){
	$i = 0;
	return function() use ($x, &$i){
		if(isset($x[$i]))
			$x[++$i];
		return $x[$i];
	};
}

$next = setup('vadim');
echo $next()."\n";
echo $next()."\n";
echo $next()."\n";
echo $next()."\n";