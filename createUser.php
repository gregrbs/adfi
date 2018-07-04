<?php

require('start.php');
require('fonctions.php');
createUser('entreprise', 'login', 'mdp', 'statut');
$userinfo = profil('id');

$membres = $bdd->query('SELECT * FROM test ORDER BY id');



if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){
		$supprime = (int) $_GET['supprime']; 

		$req = $bdd->prepare('DELETE FROM test WHERE id = ?'); 
		$req->execute(array($supprime));
	}

?>
<html>
	<head>
	<title>ADFI France: Gestion des temps</title>
	<meta charset="utf-8">
	<meta link rel="stylesheet" type="text/css" href="/adfi/style.css" media="all"/>
	</head>
		<body>
			<div align="center">
				<h1>Création & modification d'utilisateurs</h1>
				<br /><br /><br />
				<form method="POST" action="">

				<table>
					<tr>
						<td align="right">
							<label for="entreprise"> Entreprise :</label>
						</td>
						<td>
							<input type="text" placeholder="Entrez entreprise" id="entreprise" name="entreprise" value="<?php if(isset($entreprise)) {echo $entreprise; } ?>"
							/>
						</td>
					</tr>

					<tr>
						<td align="right">
							 <label for="login"> Login :</label>
						</td>
						<td>
							<input type="text" placeholder="Saisir un login" id="login" name="login" value="<?php if(isset($login)) {echo $login; } ?>"
							/>
						</td>
					</tr>

					<tr>
						<td align="right">
							<label for="mdp"> Mot de passe :</label>
						</td>
						<td>
							<input type="password" placeholder="Saisir un mot de passe" id="mdp" name="mdp"/>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label  for="statut"> Statut :</label>
						</td>
						<td>								
							<select id="statut" name="statut">
							<option value="1">Admin</option>
 							<option value="2">User</option>
 							</select>
						</td>			    
					</tr>
					<tr>
						<td></td>
						<td align="center">
							<br />
							<input type="submit" name="formCreatUser" value="Créer cet utilisateur" />
						</td>
					</tr>
				</table>
			</form>
<p align ="left"><u>Users existants</u></p>
<ul align ="left" >
	<?php while($m = $membres->fetch()) { ?>
	<li><?= $m['id'] ?> : <?= $m['login'] ?> 
	- <a href="createUser.php?supprime=<?= $m['id'] ?>">Supprimer</a></li> - 
	<a href="profil.php?modifier=<?= $m['id'] ?>">modifier</a></li>- 
	<a href="profil.php?details=<?= $m['id'] ?>">Détails</a></li>
	<?php } ?>  
</ul>
			</div>
		</body>
</html>