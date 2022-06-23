<?php
// liste des API publiques à utiliser dans des projets 
// https://github.com/public-apis/public-apis

//clé pour les stats
$key = $_GET['key'] ?? null;
//en se servant de  $_SERVER['REQUEST_METHOD'] on peut gérer (RESTFULL) les méthodes GET/POST/PUT/DELETE/PATCH
//action pour savoir quel fonction demander
$action = $_GET['action'] ?? null;
if(!is_null($key)) {
  // recherche et exécution de l'action demandée
  switch($action){
    //hello prenom nom
    case 'hello' :    $prenom = $_GET['prenom'] ?? 'Albert';
                      $nom = $_GET['nom'] ?? 'De Monaco';
                      echo 'Bonjour ' . $prenom . ' ' . $nom; 
                      break; //ne jamais oublier 
    //add a b
    case 'add':       $a = $_GET['a'] ?? 0;
                      $b = $_GET['b'] ?? 0;
                      echo $a + $b;
                      break;
    //liste cat
    case 'liste':     $cat = $_GET['cat'] ?? 1;
                      $pdo = new pdo('mysql:host=localhost;dbname=doctrine;charset=utf8', 'root', '');
                      $retour = $pdo->query('SELECT p.id, p.nom, p.prix, c.libelle, e.nom as emplacement 
                                            FROM produits p 
                                            JOIN emplacements e
                                            on p.emplacement_id = e.id
                                            JOIN categories c
                                            ON p.categorie_id = c.id
                                            where p.categorie_id = '.$cat . ' ORDER BY p.nom ASC')
                                    ->fetchAll(PDO::FETCH_ASSOC);
                      echo json_encode($retour);
                      break;
    //retourobj
    case 'retourobj': $obj = new stdClass();
                      $obj->a = 3;
                      $obj->b = 5;
                      echo json_encode($obj);
                      break;
    //retourbin
    case 'retourbin': $file = file_get_contents('images/foo.jpg');
                      echo base64_encode($file);
                      break;  
    //monami
    case 'monami':    //le serveur est lui même client d'un autre WS
                      $options = ['location' => 'http://localhost/coderbase_it/XML-WS/soapsrv2.php',
                                   'uri' => 'http://localhost/coderbase_it/XML-WS/'];
                      $client = new SoapClient(NULL, $options);
                      echo $client->hello('Nîmes', 'Ano');    
                      break;    
    //en attendant la suite...
    default:          echo 'Tu as oublié ta demande...';
  }
}
else echo 'Oups';