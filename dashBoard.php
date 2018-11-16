<?php
require_once("class/cfg.php");
if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit;
}

$user = User::getUser();
User::checkIfIsTeacher();

 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
      <?php require_once 'head.php' ?>
      <title>Tableau de bord</title>
  </head>
  <body>
  <header class="d-flex container-fluid bg-info text-white" style="height:140px;padding: 20px 5vw;">
        <h1> Gestionnaire de QCM
          <?php
          if (isset($_SESSION['is_teacher'])) {
              echo "pour les enseignants";
            }else{
              echo "pour les étudiants";
            }
          ?>
         </h1>
      <h2 class="d-flex justify-self-center align-self-center" style="padding:185px;" > Bienvenue, <?= $user->prenom ?> </h2>
      <div class="align-self-end"> <!-- bouton react -->                <!-- <img src="powerOff.png" alt=""> -->
        <a href="disconnect.php" class="btn btn-danger" style="padding:10px 20px;">
          Se déconnecter
        </a>
      </div>
    </header>
    <main >
      <?php
      if (isset($_SESSION['is_teacher'])) {
          require('teacher/_teacherNav.php');
        }else{
          require('student/_studentNav.php');
        }
      ?>
    </main>

  </body>
</html>
