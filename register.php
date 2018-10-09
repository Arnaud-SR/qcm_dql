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
    <?php require_once 'head.php' ?>
    <script src="assets/js/main.js"></script>
    <title>Inscription</title>
</head>
<body>
<form method="post">
  <h1 align='center'>Création d'un nouveau compte</h1>
  <div class="">

  </div>
  <div class="form-group col-sm-6">
    <input placeholder="adresse@email.com" type="email" class="form-control" required>
  </div>

  <div class="form-group col-sm-6">
      <input name="password" placeholder="mot de passe" class="form-control" required>
  </div>

  <div class="form-group col-sm-6">
      <input name="password_verify" placeholder="confirmation du mot de passe" class="form-control" required>
  </div>

  <div class="form-group col-sm-6">
      <input placeholder="Nom" class="form-control" name="nom" required>
  </div>

  <div class="form-group col-sm-6">
      <input placeholder="Prénom" class="form-control" name="prenom" required>
  </div>

  <div class="form-group col-sm-6">
      <select class="form-control" required title="status" id="select_role">
          <option value="" disabled selected>Vous êtes..</option>
          <option value="0">Etudiant</option>
          <option value="1">Enseignant</option>
      </select>
  </div>

    <div class="form-group col-sm-6 d-none" id="block_code">
        <input placeholder="identifiant" class="form-control">
    </div>
    <input type="submit" name="submitRegister" class="btn btn-success">
</form>
</body>
</html>
