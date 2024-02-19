<?php
$title="Connexion";
ob_start();

?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>BIENVENUE SUR L'ESPACE DE CONNEXION</title>
	<meta charset="UTF-8">

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
