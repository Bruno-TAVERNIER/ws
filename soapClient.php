<?php
//tableau d'options pour la connexion
$options = ['location' => 'http://localhost/coderbase_it/XML-WS/soapsrv.php',
            'uri' => 'http://localhost/coderbase_it/XML-WS/'];
//création du client (null ou adresse wsdl)
// si wsdl http://localhost/coderbase_it/XML-WS/soapsrv.php?wsdl
$client = new SoapClient(NULL, $options);
//appel de la fonction hello du client 
echo $client->hello('TAVERNIER', 'Bruno') . '<br/>';
//appel de la fonction addition du client
echo $client->add(3, 4) . '<br/>';

//retour d'une liste de produits qui viennent de la BDD 
$prod = $client->listeProduits(1);
foreach($prod as $produit) {
  echo $produit['id']  . ' ' . $produit['nom'] . '<br>';
}
//retour d'un objet qu'il faut désérialiser
$obj = $client->retourObjet();
$retour = unserialize($obj);
echo $retour->truc .'<br>';

//retour API AMI
echo $client->monami(). '<br>';

//retour d'une image (fichier binaire)
$img = $client->retourFichier();
file_put_contents('img.jpg', base64_decode($img));
echo '<img src="img.jpg" alt="merci le WS">';