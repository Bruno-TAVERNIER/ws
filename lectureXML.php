<?php
//traitement d'un fichier XML
$xml = simplexml_load_file('SansNom.xml') or die('oups');

echo '<p>Bouton Préférences: ' . $xml->mnu_btn_pref .'</p>';
echo '<p>Bouton statistiques ' . $xml->mnu_btn_stat .'</p>';
echo '<p>Préférences marges: ' . $xml->prf_lbl_marg .'</p>';
echo '<p>préférence label CR: '. $xml->prf_lbl_namcr . '</p>';
// récupération des attributs dans un tableau php
$atrlblcr = $xml->prf_lbl_namcr->attributes();
//affichage de l'attribut par indice ou nom
echo $atrlblcr[0] .'<br>';
echo $atrlblcr['hlp'] .'<br>';

foreach($xml->file as $file) {
  $attr = $file->attributes();
  //print_r($attr);
  foreach($attr as $name => $a){
    echo '<p>' . $name . ' ' .$a .'</p>';
  }
  echo '<p> Téléchargement du répertoire : ' . $file->org .'</p>';
  echo '<p> Vers le répertoire : ' . $file->dst .'</p>';
}
//requete xpath
$xpath = $xml->xpath('/phpSpool/file/org');
print_r($xpath);
foreach($xpath as $org){
  echo '<p>' . $org .'</p>';
}