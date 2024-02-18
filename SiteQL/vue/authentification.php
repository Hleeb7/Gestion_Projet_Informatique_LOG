<?php
$title="ESIEE-IT";
ob_start();

?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>BIENVENUE SUR L'ESPACE DE CONNEXION</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="contenu/cssauthentification/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssauthentification/contenu/cssauthentification/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssauthentification/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssauthentification/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssauthentification/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssauthentification/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssauthentification/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssauthentification/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssauthentification/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssauthentification/css/util.css">
	<link rel="stylesheet" type="text/css" href="contenu/cssauthentification/css/main.css">
<!--===============================================================================================-->

</head>
<form name="form1" method="POST" onsubmit="return checkform(this);" action="index.php?page=authentif"">
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						BIENVENUE SUR L'ESPACE DE CONNEXION
					</span>
					<span class="login100-form-title p-b-48">
						<i class="fa fa-hospital-o"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "username">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Saisissez votre identifiant"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="mdp" name="mdp">
						<span class="focus-input100" data-placeholder="Saisissez votre code d'accès"></span>
					</div>



					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Se connecter
							</button>
						</div>
					</div>

		<!--			<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="#">
							Sign Up
						</a>                 -->

          

					</div>

				</form>

			</div>
		</div>
	</div>

<center />  <a class=" btn btn-light btn-xl js-scroll-trigger" href="index.php?page=faq">
  Cliquer pour connaitre les avantages de ce partage
	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="contenu/cssauthentification/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="contenu/cssauthentification/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="contenu/cssauthentification/vendor/bootstrap/js/popper.js"></script>
	<script src="contenu/cssauthentification/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="contenu/cssauthentification/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="contenu/cssauthentification/vendor/daterangepicker/moment.min.js"></script>
	<script src="contenu/cssauthentification/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="contenu/cssauthentification/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="contenu/cssauthentification/js/main.js"></script>

</body>
</html>


<?php
if (isset($_POST["username"])&& isset($_POST["mdp"]))
{
    $login=htmlspecialchars($_POST["username"]);
    $mdp=htmlspecialchars($_POST["mdp"]);
    echo $login;
  $z=aut($login,$mdp);
 // print_r($z);
  if($z==true)
  {
      header(  'Location: index.php');
  }
  else{
 // echo "<script>alert('erreur');</script>";
  }
}
else{
}

$contenu = ob_get_clean();
render($contenu,  $title);

?>
