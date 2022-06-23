<?php
$source ="<phpSpool>
	<mnu_btn_pref>Préférences</mnu_btn_pref>
	<mnu_btn_stat>Statistiques</mnu_btn_stat>
	<mnu_btn_jour>Journal</mnu_btn_jour>
	<mnu_btn_plan>Planification</mnu_btn_plan>
</phpSpool>";
// traitement d'une chaine XML
$xml = simplexml_load_string($source) or die('oups');

echo '<p>Bouton Préférences: ' . $xml->mnu_btn_pref .'</p>';
echo '<p>Bouton statistiques ' . $xml->mnu_btn_stat .'</p>';
