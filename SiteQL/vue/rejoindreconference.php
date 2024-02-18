<?php
$title="ETPVISIO";
ob_start();

?>






<!DOCTYPE html>
<html lang="en">
<head>
	<title>RejoindreConférence</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="contenu/cssrejoindreconference/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssrejoindreconference/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssrejoindreconference/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssrejoindreconference/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssrejoindreconference/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssrejoindreconference/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssrejoindreconference/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssrejoindreconference/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssrejoindreconference/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contenu/cssrejoindreconference/css/util.css">
	<link rel="stylesheet" type="text/css" href="contenu/cssrejoindreconference/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(contenu/cssrejoindreconference/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Rejoindre une conférence
					</span>
				</div>

				<!--<form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Saisir votre identifiant">
						<span class="label-input100">Identifiant</span>
						<input class="input100" type="text" name="username" placeholder="Saisissez votre identifiant">
						<span class="focus-input100"></span>

        </form> !-->

			<form class="login100-form validate-form" method="GET" onsubmit="return checkform(this);" action="https://etpvisio.projet-sante-numerique.fr/demo/demo1.jsp">
			<div class="wrap-input100 validate-input m-b-26" data-validate="Saisir votre identifiant">
			<span class="label-input100">Identifiant</span>
              <input type="text" id="username" required="" name="username" placeholder="Saisissez votre identifiant" size="29" class="field input-default" autofocus>
			  <span class="focus-input100"></span>




					<div class="container-login100-form-btn">


					</div>



					</div>

					<input type="submit" value="Joindre" class="login100-form-btn"><br>
              <input type="hidden" name="action" value="create">
			  <i class="fa fa-heartbeat"></i>
        </form>



				<!--	<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Mot de passe</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>  -->


			<!--		<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
						-->
					</div>

					<div class="container-login100-form-btn">

					</div>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="contenu/cssrejoindreconference/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="contenu/cssrejoindreconference/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="contenu/cssrejoindreconference/vendor/bootstrap/js/popper.js"></script>
	<script src="contenu/cssrejoindreconference/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="contenu/cssrejoindreconference/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="contenu/cssrejoindreconference/vendor/daterangepicker/moment.min.js"></script>
	<script src="contenu/cssrejoindreconference/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="contenu/cssrejoindreconference/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<?php
$contenu = ob_get_clean();
render($contenu,  $title);

?>
