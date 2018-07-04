<?php

require ('start.php');
require ('fonctions.php');
editProfil('newmdp1', 'newmdp2');
$userinfo = profil('id');

?>
<html>
	<head>
		<title>ADFI France: Gestion des temps</title>
		<meta charset="utf-8">
		<meta link rel="stylesheet" type="text/css" href="/adfi/style.css" media="all"/>
	</head>
	<body>
		<div align="center">
			<h2>Edition du profil</h2>
			<div align="left">
				<form method="POST" action="">
					<label>Nouveau mot de passe :</label>
					<input type="password" name="newmdp1" placeholder="Nouveau mot de passe" /><br /><br />
					<label>Confirmation - mot de passe :</label>
					<input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
					<input type="submit" value="Mise à jour du profil !" name="formeditionprofil" /><br /><br />
				</form>
			</div>		
		</div>
	</body>
</html>
<?php
