<?php
$url = 'http://localhost/coderbase_it/xml-ws/restSrv3.php?key=123456';
$r1 = file_get_contents($url.'&action=hello&nom=TAVERNIER&prenom=Bruno');
echo $r1 . '<br>';

$r2 = file_get_contents($url.'&action=add&a=1&b=2');
echo $r2 . '<br>';

$r3 = file_get_contents($url.'&action=liste&cat=2');
$result = json_decode($r3, true);
echo '<pre>' . print_r($result, true) . '</pre>';

$r4 = file_get_contents($url.'&action=retourobj');
$result2 = json_decode($r4, true);
echo '<pre>' . print_r($result2, true) . '</pre>';

$r5 = file_get_contents($url.'&action=retourbin');
$result3 = base64_decode($r5);
file_put_contents('restimg.jpg', $result3);
echo '<img src="restimg.jpg" alt="API REST"><br>';

$r6 = file_get_contents($url.'&action=monami');
echo $r6 . '<br>';

/* appel de méthodes dans le framework MVC maison */
$url7 = 'http://localhost/mvc/rest'; //retour d'un simple texte
$r7 = file_get_contents($url7);
echo $r7;

$url8 = 'http://localhost/mvc/rest2'; //retour d'un tableau json venant de la BDD
$r8 = file_get_contents($url8);
$result8 = json_decode($r8, true);
echo '<pre>' . print_r($result8, true) . '</pre>';

// appel API conversion monnaie Frankfurter
$url9 = 'https://api.frankfurter.app/latest?amount=10&from=USD&to=EUR';
$r9 = file_get_contents($url9);
$result9 =json_decode($r9, true);
echo '<p> 10$ => ' . $result9['rates']['EUR'] . '€</p>';
?>
