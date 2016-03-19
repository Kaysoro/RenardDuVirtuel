<?php
session_start();

if(isset($_SESSION['connected']) && $_SESSION['connected'])
    header('Location:./projets.php');
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>{ Accølad } Aménagement collaboratif et citoyen du Laval de demain</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
<?php
        if(isset($_SESSION['connectionError']) && $_SESSION['connectionError'])
        {
?>
        <details id="errorMessage">Adresse email ou mot de passe erroné !</details>
<?php
        }
?>

		<!-- Header -->
			<header id="header">
				<h1>{ Accølad }</h1>
				<p>Visitez, votez, contribuez.</br>Participez à l'urbanisme du Laval de demain !</p>
			</header>

		<div id="wrapper">

		<form name="login-form" class="login-form" action="login.php" method="post">

			<div class="header-form">

			</div>

			<div class="content">
				<input name="username" type="email" class="username" placeholder="Adresse Mail" required />
				<div class="user-icon"></div>
				<input name="password" type="password" class="password" placeholder="Mot de passe" required />
				<div class="pass-icon"></div>
			</div>
			<div class="footer">
				<input type="submit" name="submit" value="Connecter" class="button" />
				<input type="submit" name="submit" value="S'inscrire" class="register" />
			</div>
		</form>
	</div>
		<!-- Signup Form
			<form id="signup-form" method="post" action="#">
				<input type="submit" value="Pour" />
				<input type="submit" value="Contre" />
			</form>-->

		<!-- Footer -->
				<ul class="copyright">
					<li>Virtual CUP 2016</li><li>Crédits: Les renards du virtuel</li>
				</ul>

			<script src="assets/js/main.js"></script>

	</body>
</html>
