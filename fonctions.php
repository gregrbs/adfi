<?php

function editProfil($newmdp1, $newmdp2) 
{
	if(isset($_SESSION['id']))
	{
		global $bdd; 
		$requser = $bdd->prepare("SELECT * FROM test WHERE id = ?");
		$requser->execute(array($_SESSION['id']));
		$user = $requser->fetch();

		if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
		{
			$mdp1 = sha1($_POST['newmdp1']);
			$mdp2 = sha1($_POST['newmdp2']); 

			if($mdp1 == $mdp2)
			{
				$insertmdp = $bdd->prepare("UPDATE test SET motdepasse = ? WHERE id = ? ");
				$insertmdp->execute(array($mdp1, $_SESSION['id']));
				header('Location: profil.php?id='.$_SESSION['id']);

			}
			else
			{
				$msg = "Vos mots de passe ne correspondent pas !";
				echo $msg;
			}
		}
	}
} 

function connexion($loginconnect, $mdpconnect)
{
	if (isset($_POST['formconnexion'])) 
	{
		global $bdd;
		$loginconnect = htmlspecialchars($_POST['loginconnect']);
		$mdpconnect = sha1($_POST['mdpconnect']);
		if (!empty($loginconnect) AND !empty($mdpconnect)) 
		{
			$requser = $bdd->prepare("SELECT * FROM test WHERE login = ? AND motdepasse = ?");
			$requser->execute(array($loginconnect, $mdpconnect));
			$userexist = $requser->rowCount();
			if ($userexist == 1)
			{
				$userinfo = $requser->fetch();
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['login'] = $userinfo['login'];
				header("Location: profil.php?id=".$_SESSION['id']);
				if(!empty($_SESSION['login']) AND !empty($_POST['statut']) == 1)
					{
						global $bdd;
						$login = htmlspecialchars($_POST['login']);
						$statut = htmlspecialchars($_POST['statut']);
						$requser = $bdd->prepare("SELECT * FROM test WHERE login = ? AND statut = ? ");
						$requser->execute(array($login, $statut));
						$lawuser = $requser->rowCount();
					}
				else
				{
					
				}
			}
			else
			{
				$erreur = "Mauvais login ou mot de passe !";
				echo ($erreur);
			}
		}
		else
		{
			$erreur = "Tous les champs doivent être complétés !";
			echo ($erreur);
		}
	}
}

function law($login, $statut)
{
	
}

function files($file_name, $file_url)
{
	if(!empty($_FILES))
	{
		global $bdd;
		$file_name = $_FILES['documents']['name'];
		$file_extension = strrchr($file_name, ".");
		$file_tmp_name = $_FILES['documents']['tmp_name'];
		$file_dest = 'documents/'.$file_name;

		$extensions_autorisees = array('.PNG','.png','.jpg','.jpeg','.JPG','.JPEG','.rtf','.RTF','.txt','.TXT','.docx','.DOCX','.doc','.DOC','.pdf', '.PDF');
			if(in_array($file_extension, $extensions_autorisees))
			{
				if(move_uploaded_file($file_tmp_name, $file_dest))
				{
					$req = $bdd->prepare('INSERT INTO documents(file_name, file_url) VALUES(?,?)');
					$req->execute(array($file_name, $file_dest));
					echo 'Fichier envoyé avec succès ! ';
				}
				else
				{
					echo "Une erreur est survenue lors de l'envoi du fichier ! ";
				}
					
			}
			else
			{
				echo "Ce format de fichier n'est pas accepté!"; 
			}
	} 
}	 

function profil($id)
{	 
	if (isset($_GET['id']) AND $_GET['id'] > 0) 
	{
		global $bdd;
		$getid = intval($_GET['id']);
		$requser = $bdd->prepare('SELECT * FROM test WHERE id = ?');
		$requser->execute(array($getid));
		$userinfo = $requser->fetch();
		return $userinfo; 	
	}	
}

function createUser($entreprise, $login, $mdp, $statut)
{
	if(isset($_POST['formCreatUser']))
	{
		global $bdd;
		$entreprise = htmlspecialchars($_POST['entreprise']);
		$login = htmlspecialchars($_POST['login']);
		$mdp = sha1($_POST['mdp']);
		$statut = htmlspecialchars($_POST['statut']);

		if(!empty($_POST['entreprise']) AND !empty($_POST['login']) AND !empty($_POST['mdp']) AND !empty($_POST['statut']))
		{
			$reqlogin = $bdd->prepare("SELECT * FROM test WHERE login = ?");
			$reqlogin->execute(array($login));
			$loginexist = $reqlogin->rowCount();

			if($loginexist == 0)
			{
				$insertmbr =$bdd->prepare("INSERT INTO test(entreprise, login, motdepasse, statut) VALUES(?, ?, ?, ?)");
				$insertmbr->execute(array($entreprise, $login, $mdp, $statut));							
				$erreur = "Le compte a bien été créé !";				
				echo ($erreur);		
			}
			else
			{
				$erreur = "Ce login est déjà rallié à un compte, veuillez en attribuer un autre";
				echo ($erreur);			
			}
		}
			else
			{
				$erreur ="Tous les champs doivent être complétés !";
				echo ($erreur);				
			}			
	}				
}
