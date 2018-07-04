<?php

require('start.php');
require('fonctions.php');
$membres = $bdd->query('SELECT * FROM test ORDER BY id DESC LIMIT 0,5');
$details = $bdd->query('SELECT * FROM details ORDER BY id DESC LIMIT 0,5');


if(!isset($_SESSION['id']) AND $_SESSION['id'] != 1) {
	exit();
}

if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){
		$supprime = (int) $_GET['supprime']; 

		$req = $bdd->prepare('DELETE FROM test WHERE id = ?'); 
		$req->execute(array($supprime));
	}

?>
<!DOCTYPE html>
<html>
<head>
<title>Administration</title>
	<meta charset="utf-8">
	<meta link rel="stylesheet" type="text/css" href="/adfi/style.css" media="all"/>
	<!-- link rel="shortcut icon" type="image/png" href="adfi.png" /> -->
</head>
<body>

	<ul>
		<?php while($m = $membres->fetch()) { ?>
		<li><?= $m['id'] ?> : <?= $m['login'] ?> 
		- <a href="administration.php?supprime=<?= $m['id'] ?>">Supprimer</a></li> 
		- <a href="administration.php?details=<?= $m['id'] ?>">Détails</a></li>
		<?php } ?>  

		<?php while($d = $details->fetch()) { ?>
		<li><?= $d['id'] ?> : <?= $d['login'] ?>  
		- <a href="administration.php?details=<?= $d['id'] ?>">Détails</a></li>
		<?php } ?> 
		

	</ul>



</body>
</html>