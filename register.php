<?php
require_once("class/cfg.php");
if (filter_input(INPUT_POST, "submitRegister")) {
    $user = new User();
    $user->login = filter_input(INPUT_POST, 'login', FILTER_VALIDATE_EMAIL, FILTER_FLAG_NO_ENCODE_QUOTES);
    $user->password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $user->nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $user->prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

    $user->register();
    header('location: index.php');
    exit;
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Inscription</title>
</head>
<body>

<form method="post">
  <h1 align='center'>Création d'un nouveau compte</h1>
  <div class="">

  </div>
  <div class="form-group col-sm-6">
    <input placeholder="adresse@email.com" type="email" class="form-control" >
  </div>

  <div class="form-group col-sm-6">
    <input for="pwd1" placeholder="mot de passe" class="form-control">
  </div>

  <div class="form-group col-sm-6">
    <input for="pwd2" placeholder="confirmation du mot de passe" class="form-control">
  </div>

  <div class="form-group col-sm-6">
    <input placeholder="Nom" class="form-control">
  </div>

  <div class="form-group col-sm-6">
    <input placeholder="Prénom" class="form-control">
  </div>

  <div class="form-group col-sm-6">

  </select>
    <select class="form-control" name="">

    <input placeholder="identifiant" class="form-control">
  </div>

    <input type="submit" name="submitRegister">
  </div>
</form>
</body>
</html>
