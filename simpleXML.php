<?php
$tContacts = array(
   ['nom' => 'MARCEL', 'prenom' => 'Benhur', 'type' => 'Développeur C++'],
   ['nom' => 'DOE', 'prenom' => 'John', 'type' => 'Développeur C'],
   ['nom' => 'TAVERNIER', 'prenom' => 'Bruno', 'type' => 'Développeur PHP'],
);

// création d'une structure XML (avec une entête XML valide pour l'enregistrement en fichier)
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><myXML />');
// création de l'arbre XML
foreach($tContacts as $cle => $contact){
  $ct = $xml->addchild('person');
  $ct->addAttribute('id', $cle);
  $ct->addChild('name', $contact['nom']);
  // on ajoute un attribut au noeud "name"
  $ct->name->addAttribute('type', $contact['type']);
  $ct->addChild('firstname', $contact['prenom']);
}
// entête pour dire au navigateur que c'est du XML (type MIME)
header('Content-Type: application/xml');
//enregistrement du XML dans un fichier
file_put_contents('monfichier.xml', $xml->asXML());
//affichage du XML
echo $xml->asXML();
