<?php
/* conversion d'un tableau en json */
$tableau = ['nom' => 'TAVERNIER', 'prenom' => 'bruno', 'age' => 25];
$tJson =  json_encode($tableau);
echo $tJson.'<br>';
/* conversion d'un objet en json*/
class Truc {
  
  function __construct(public int $a, public int $b, public int $c){}
}
$a = new Truc(1,2,3);
$oJson = json_encode($a);
echo $oJson .'<br>';

// conversion tableau json en tableau
$tableau2 = json_decode($tJson, true);
print_r($tableau2);
// conversion tableau json en objet
$obj2 = json_decode($tJson);
echo $obj2->nom;

//conversion obj json en tableau
$obj3 = json_decode($oJson, true);
print_r($obj3);

//conversion obj json en objet
$obj4 = json_decode($oJson);
echo $obj4->a;