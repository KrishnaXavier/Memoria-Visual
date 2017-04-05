<?php 
$array = [];
$array['a'] =10;
$array['b'] =20;
$array['c'] =30;
$array['erro'][] =33;
$array['erro'][] =43;
$array['erro'][] =53;

echo json_encode($array);
echo "<br>erro: ";
echo json_encode($array['erro']);

//$a = {"semestre":"1","cadeiras":[["DES.001"]],"autor":"a","titulo":"a","data":"2017-03-22","tipo":"a","imagens":{"erros":["A imagem deve ser de no maximo 1MB"]}};
//echo "<br><br><br>outro array: ".$a;


