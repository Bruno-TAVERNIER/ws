<?php
class MonServeur2 { 
  // première fonction pour faire joli
  function hello(string $nom, string $prenom) :string{
    return 'Bonjour ' . $prenom . ' ' .$nom;
  }
}
// options du serveur SOAP
$options = ['uri' => 'http://localhost/coderbase_it/XML-WS/'];
// création du serveur (NULL => WSDL)
$server = new SoapServer(NULL, $options);
//attachement de la classe au serveur
$server->setClass('MonServeur2');
//gestion des demandes
$server->handle();