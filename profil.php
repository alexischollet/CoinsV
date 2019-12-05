<?php

session_start();

$bdd= new PDO('mysql:host=127.0.0.1;dbname=espace_membre','root','');

if (isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id =?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();

?>
<html>
<head>
	<title>Connexion - CoinsViewers</title>
</head>
<body>
	<div align="center">
		<h2>
			Profil de <?php echo $userinfo['pseudo'];  ?>
		</h2>
		<br /><br />
		Pseudo = <?php echo $userinfo['pseudo'];  ?>
		<br />
		
		<?php
		//Afficher des infos pour les gens connectésseulement sur la session
		if ( isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
		?>
		Mail = <?php echo $userinfo['mail'];  ?>
		<br />
		<a href="bdd/deconnexion.php">Se déconnecter</a>
		<?php
		}
		?>
	</div>
</body>
</html>
<?php
}
else{
}
?>