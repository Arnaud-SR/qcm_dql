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
    <title>Inscription</title>
</head>
<body>

<form method="post">
    <label for="">Login : <input type="text" name="login"></label>
    <label for="">Mdp : <input type="password" name="password"></label>
    <label for="">Nom : <input type="text" name="nom"></label>
    <label for="">Prenom : <input type="text" name="prenom"></label>
    <input type="submit" name="submitRegister">
</form>
</body>
</html>
