<?php
/*
par Édouard Lopez: http://www.google.com/profiles/edouard.lopez

*/
global $rootDir;
$langmessage['lang'] = 'fr';
require $rootDir.'/include/languages/'.$langmessage['lang'].'/main.inc';
//var_dump($rootDir.'/include/languages/'.$langmessage['lang'].'.php');

$langmessage['Add sharing service'] = 'Ajouter des boutons de partage à votre site';
$langmessage['Missing your language'] = 'Les fichiers pour votre langue n\'existe pas, créé les dans <var>/addons/share/languages/</var> en traduisant à partir de l\'anglais ou tout autres langues.';
$langmessage['Principle intro'] = 'Pour ajouter des boutons de partage, vous devez obtenir le fragment de code <abbr title="pour décrire un document: HyperText Markup Language">HTML</abbr> fourni par les services de <span lang="en">bookmarking social</span>, et l\'ajouter à votre installation gpEasy.';
$langmessage['Get HTML snippet'] = 'Obtenir le fragment de code <abbr title="pour décrire un document: HyperText Markup Language">HTML</abbr> depuis&nbsp:';
$langmessage['Add HTML snippet to your site'] = 'Ajouter le fragment de code HTML à votre site';
$langmessage['placeholder: insert HTML from sharing service'] = 'Insérer le fragment de code HTML d\'un service de partage';
$langmessage['submit: add sharing button'] = 'Ajouter les boutons de partage';
$langmessage['open in new window'] = 'S\'ouvre dans une nouvelle fenêtre';
$langmessage['Snippet added'] = 'Le fragment de code a été <em>enregistré avec succès</em>.';
$langmessage['Locate sharing buttons'] = 'Les boutons doivent maintenant être visible <em>en bas de votre page</em> (emplacement du dernier gadget).';
$langmessage['Change sharing buttons location'] = 'Vous pouvez modifier leur emplacement dans %s.';

?>
