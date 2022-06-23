<?php
//appel http://localhost/coderbase_it/xml-ws/restsrv.php?&nom=Doe&prenom=John&apikey=azerty1234
$apikey = $_GET['apikey'] ?? 'inconnu';
if($apikey <> 'inconnu')  {
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //si méthode post => ajout en BDD
    $nom = $_POST['nom'] ?? 'Einstein'; //opérateur nul coalescent (PHP 7)
    $prenom = $_POST['prenom'] ?? 'Albert';
  }
  else {
    // si méthode GET, lecture d'informations
    $nom = $_GET['nom'] ?? 'DE MUSET';
    $prenom = $_GET['prenom'] ?? 'Alfred';
  }
    // affichage dans le navigateur
  echo 'Bonjour ' . $prenom . ' ' . $nom;
}
else echo "<p>T'as encore oublié ta clé...</p>";
?>
