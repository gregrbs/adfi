<?php

require('start.php');
require('fonctions.php');
files('file_name', 'file_url');
$userinfo = profil('id');


?>
<head>
	<title>ADFI France: Gestion des temps</title>
	<meta charset="utf-8">
</head>

<body>
		<div name="id" align="center">
			<h2>Profil de <?php echo $userinfo['login']; ?></h2>
			<br />
			Login = <?php echo $userinfo['login']; ?>
			<br />	
			Entreprise = <?php echo $userinfo['entreprise']; ?>
			<br />
			<br />	
			<br />
			<br />
			<label class= "admin" for="mon_fichier">Ajouter documents (jpg,png,rtf,txt,doc,docx,pdf) :</label><br />
		<form method="POST" enctype="multipart/form-data">	
     	<!-- Le contenu du formulaire est à placer ici... -->
			<input type="file" name="documents" />
			<input type="submit" value="Envoyer le document" />	
		</form>
			<br />
			<br />
			<a href="editionprofil.php">Edition du profil</a>
			<br />
			<br />
			<a class="admin" href="createUser.php">Création & modification d'utilisateurs</a>
			<br />
			<br />
			<a href="deconnexion.php">Se déconnecter</a>
	<h2>Documents</h2>
	<?php
	
		global $bdd; 
		$req = $bdd->query('SELECT file_name, file_url FROM documents');
		while($data = $req->fetch())
		{
			echo $data['file_name'].' : '.'<a href="'.$data['file_url'].'">Afficher :'. $data['file_name'].'</a><br/>';
		}
	?>		
		</div>		
</body>
</html>
