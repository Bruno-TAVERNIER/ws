<?php
$url = "http://localhost/coderbase_it/xml-ws/restsrv.php?apikey=azerty1234&nom=Doe&prenom=John";
// appel de l'api comme la lecture d'un fichier distant
$reponse = file_get_contents($url);
echo '<p>' . $reponse .' (' . strlen($reponse) . ' caractères) </p>';
echo '<hr>';

$url2 = "http://localhost/coderbase_it/xml-ws/restsrv2.php?cat=2";
$rep2 = file_get_contents($url2);
//$tableau =  unserialize($rep2);
$tableau =  json_decode($rep2, true);
print_r($tableau);
echo $tableau[0]['nom'];
echo '<hr>';
$start = microtime(true);
$url3 = 'https://geo.api.gouv.fr/communes?fields=centre,departement,population&nom=montpellier';
$rep3 = file_get_contents($url3);
echo $rep3;
$end = microtime(true);
echo '<p>Tps: ' . ($end - $start) . ' secondes</p>';
$json = json_decode($rep3, true);
/* http://jsonviewer.stack.hu/ */
echo '<pre>' . print_r($json, true) .'</pre>';

echo $json[0]['centre']['coordinates'][1];