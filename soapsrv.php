<?php
/* classe "métier" */
class MonServeur {

  // première fonction pour faire joli
  function hello(string $nom, string $prenom) :string{
    return 'Bonjour ' . $prenom . ' ' .$nom;
  }
  // fonction mathématique de haut niveau
  function add(int $a, int $b): int {
    return $a + $b;
  }
  //récupération d'informations en BDD
  function listeProduits(int $cat) :array{
    //singleton !
    $pdo = new PDO('mysql:host=localhost;dbname=doctrine;charset=utf8', 'root', '');
    $rq = "SELECT id, nom FROM produits where categorie_id = " . $cat;
    $result = $pdo->query($rq)->fetchAll(PDO::FETCH_ASSOC);
    //sécurité !
    return $result;
  }

  //retour d'un objet sérialisé
  function retourObjet() :string {
    $a = new stdClass();
    $a->truc = 'muche';
    return serialize($a);
  }

  /* retour d'un fichier binaire => à encoder en base 64 */
  function retourFichier(){
    $image = file_get_contents('images/foo.jpg');
    return base64_encode($image);
  }

  /* fonction appel WS2 */
  function monAmi() {
    $options = ['location' => 'http://localhost/coderbase_it/XML-WS/soapsrv2.php',
    'uri' => 'http://localhost/coderbase_it/XML-WS/'];
    $client = new SoapClient(NULL, $options);
    return $client->hello('Nimes', 'Ano');
  }

  // function appel WS Meteo externe ou geolocalisation 
}

// options du serveur SOAP
$options = ['uri' => 'http://localhost/coderbase_it/XML-WS/'];
// création du serveur (NULL => WSDL)
$server = new SoapServer(NULL, $options);
//attachement de la classe au serveur
$server->setClass('MonServeur');
//gestion des demandes
$server->handle();