<?php
$cat = $_GET['cat'] ?? 1; //1 si cat inexistant
$pdo = new PDO('mysql:host=localhost;dbname=doctrine;charset=utf8', 'root', '');
$rq = "SELECT * from produits where categorie_id = " . $cat;
$liste = $pdo->query($rq)->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($liste);
//echo serialize($liste)