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

    <header style="margin: 30px 15vw;" >
      <a href="index.php" class="border rounded border-primary" style="padding:10px 20px;"> > Retour</a>
    </header>

    <main>
      <form method="post" style="margin: 30px 15vw;" class="container">

        <div style="margin: 30px 10vw;">
          <h1 >Veuillez renseigner les informations suivantes</h1>
        </div>
        <p align="right">* Information obligatoire</p>

        <div class="container" style="margin:30px 10vw; padding: 20px 5vw;">

          <h2>Vos identifiants de connexion</h2>
          <div class="container" style="margin:30px 0">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" style="text-align:right;">Adresse e-mail *</label>
              <div class="col-sm-5">
                <input placeholder="email@example.com" type="email" class="form-control " required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" style="text-align:right;">Mot de passe *</label>
              <div class="col-sm-5">
                <input name="password" class="form-control " required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" style="text-align:right;">Confirmer mot de passe *</label>
              <div class="col-sm-5">
                <input name="password_verify" class="form-control " required>
              </div>
            </div>
          </div>

          <h2>Vos informations personnelles</h2>
          <div class="container" style="margin:30px 0">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" style="text-align:right;">Nom *</label>
              <div class="col-sm-5">
                <input  class="form-control" name="nom" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" style="text-align:right;">Prénom *</label>
              <div class="col-sm-5">
                <input  class="form-control" name="prenom" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" style="text-align:right;">Status *</label>
              <div class="col-sm-5">
                <select class="form-control " required title="status" id="select_role">
                    <option value="" disabled selected>Vous êtes..</option>
                    <option value="0">Etudiant</option>
                    <option value="1">Enseignant</option>
                </select>
              </div>
              <div class="form-group d-none" id="block_code">
                <div class="col-sm-7">
                  <input placeholder="XXXX-XXXX" class="form-control">
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-center" style="margin-top:40px ;">
            <input type="submit" name="submitRegister" class="btn btn-success btn-lg">
          </div>

        </div>
      </form>
    </main>
  </body>
</html>
