<?php

function sum(int|float ...$numbers)
{
	return array_sum($numbers);
}

$x = 'sum';

if (is_callable($x))
	echo $x(1, 2, 3, 1, 5);
else
	echo 'no';


$var_1 = 'Yo man waddup';

testing(function () use ($var_1) {
	echo $var_1 . '  This is a Closure in PHP';
});


function testing(Closure $func)
{
	$func();
};
