<?php 
	require ('../lib/php/requirements.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Pidu's Shop</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<link rel="stylesheet" href="../lib/css/styleAdmin.css" />
		<link rel="stylesheet" href="../lib/css/styleClient.css" />
		<link rel="shortcut icon" href="../lib/img/logo.png" title="Favicon">
	</head>
	<body class="position-absolute h-100 w-100 text-white bg-admin" id="connexion">
		<div class="container d-flex flex-column justify-content-center h-100 w-25">
			<label class="m-0" for="username">Nom d'utilisateur</label>
			<input class="form-control my-3" type="text" id="username">
			<label class="m-0" for="password">Mot de passe</label>
			<input class="form-control my-3" type="password" id="password">
			<button class="btn btn-primary my-3">Connexion</button>
			<div class="text-warning" id="error"></div>
		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="../lib/js/appConnexion.js"></script>
	</body>
</html>