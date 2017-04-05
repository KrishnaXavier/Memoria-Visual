<?php

$a1 = [];
$a2 = [];
$a3 = [];

$a1[0] = 'xxxa1-0';
$a1[1] = 'xxxa1-1';
$a1[2] = 'xxxa1-2';
$a1[3] = 'xxxa1-3';

$a2[0] = 'yyya2-0';
$a2[1] = 'yyya2-1';
$a2[2] = 'yyya2-2';

$a3[] = 'kkka3-0';
$a3[] = 'kkka3-1';
$a3[] = 'kkka3-2';
$a3[] = 'kkka3-3';

echo "<br> a3[0]: ".$a3[0];


$a2[6] = $a1;
$a2['k'] = array($a1);

echo "<br> v: ".$a2['k'][0][2];