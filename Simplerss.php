<?php
//entetes php pour éviter le cache 
header("Pragma: no cache");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
$second=utf8_encode("un deuxième message");
$troisieme=utf8_encode("un troisième message");
//nouveau flux rss version 2.0
$rss= new SimpleXMLElement("<rss/>");
$rss->addAttribute('version','2.0');
//entete du flux
$channel=$rss->addChild('channel');
$channel->addChild('description', 'Un test de flux RSS avec SimpleXML');
$channel->addChild('generator', 'MySelf');
$channel->addChild('title', 'Flux RSS SimpleXML'); 
$channel->addChild('link', 'http://localhost/rss');
//ajout des items	
//peut être remplacé par une requête BDD et une boucle...	  
$item=$channel->addchild('item');
$item->addChild('title','premier message');
$item->addChild('link','http://localhost/actu/premier.html');
$item->addChild('pubdate','2020-02-21');
$item->addChild('description','un premier message');
$item=$channel->addchild('item');
$item->addChild('title','second message');
$item->addChild('link','http://localhost/actu/second.html');
$item->addChild('pubdate','2020-02-21'); 
$item->addChild('description', $second);
$item=$channel->addchild('item');
$item->addChild('title',$troisieme);
$item->addChild('link','http://localhost/actu/troisieme.html');
$item->addChild('pubdate','2020-02-21');
$item->addChild('description',$troisieme);
$item=$channel->addchild('item');
$item->addChild('title','clefs');
$item->addChild('link','http://localhost/actu/premier.html');
$item->addChild('pubdate','2020-02-21');
$item->addChild('description','Madame X a appele. Elle veut ses clefs');
$item=$channel->addchild('item');
$item->addChild('title','clefs2');
$item->addChild('link','http://localhost/actu/toto.html');
$item->addChild('pubdate','2020-03-03');
$item->addChild('description','Madame X a rappelé. elle a retrouvé ses clefs');
$item=$channel->addchild('item');
$item->addChild('title','clefs3');
$item->addChild('link','http://localhost/actu/tutu.html');
$item->addChild('pubdate','2020-03-03');
$item->addChild('description','Madame X a encore appelé. Son chien a bouffé les clefs.');
$item=$channel->addchild('item');
$item->addChild('title','clefs4');
$item->addChild('link','http://localhost/actu/titi.html');
$item->addChild('pubdate','2020-03-03');
$item->addChild('description','Madame X a encore appelé. Son chien a recraché les clefs sur la bouche d egout.');
$item=$channel->addchild('item');
$item->addChild('title','last');
$item->addChild('link','http://localhost/actu/last.html');
$item->addChild('pubdate','2020-03-03');
$item->addChild('description','un dernier test et je me casse.');
$item=$channel->addchild('item');
$item->addChild('title','last2');
$item->addChild('link','http://localhost/actu/last.html');
$item->addChild('pubdate','2020-03-03');
$item->addChild('description','un ultime test et je me casse.');
//envoi au navigateur
header('Content-Type: application/xml');
echo $rss->asXML();
?>
