<?php

require ('start.php');
require ('fonctions.php');
connexion('loginconnect','mdpconnect');

?>
	<title>ADFI France: Gestion des temps</title>
	<meta charset="utf-8">
	<meta link rel="stylesheet" type="text/css" href="/adfi/style.css" media="all"/>
</head>
	<body>
		<div align="center">
			<h2>Connexion</h2>
			<br /><br /><br />
			<form method="POST" action="">
		<table>
			<tr>
				<td align="right">
					<label for="loginconnect" align="center" value="<?php if(isset($login)) {echo $login; } ?>">Login :</label>
				</td>
				<td>
					<input type="text" name="loginconnect" placeholder="login" />
				</td>
			</tr>
				<br></br>
			<tr>
				<td align="right">
					<label for="mdpconnect" align="center">Mot de passe :</label>
				</td>
				<td>
					<input type="password" name="mdpconnect" placeholder="Mot de passe" />
				</td>
			</tr>
				<br></br>
			<tr>
				<td></td>
				<td>
					<br />
					<input type="submit" id="connecter" name="formconnexion" value="Se connecter !" />
				</td>
			</tr>
			</table>
		</form>
		<?php
		if(isset($erreur))
		{
			echo ($erreur);
		}
		?>	
		</div>
	</body>
</html>

