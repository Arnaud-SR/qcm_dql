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
    <header class="container-fluid" style="background-color: #b8d7e0;height:120px;width:100vw; ">
        <h1> Gestionnaire de QCM
          <?php
          if (isset($_SESSION['is_teacher'])) {
              echo "pour les enseignants";
            }else{
              echo "pour les étudiants";
            }
          ?>
         </h1>
        <h2 class="text-center"> Bienvenue, <?= $user->prenom ?> </h2>
    </header>
    <main >
      <?php
      if (isset($_SESSION['is_teacher'])) {
          require('teacher/_teacherMain.php');
        }else{
          require('student/_studentMain.php');
        }
      ?>
    </main>

  </body>
</html>
