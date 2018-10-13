<?php
require_once("class/cfg.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php require_once 'head.php';
    $_SESSION['nom'] = 'Broisin';
    $_SESSION['prenom'] = 'Julien';
    $_SESSION['isTeacher'] = 'false';

    ?>
    <title>Tableau de bord</title>
  </head>
  <body>
    <header class="container-fluid" style="background-color: #b8d7e0;height:120px;width:100vw; ">
        <h1> Gestionnaire de QCM
          <?php
            if ($_SESSION['isTeacher']) {
              echo "pour les enseignants";
            }else{
              echo "pour les étudiants";
            }
          ?>
         </h1>
         <h2 class="text-center"> Bienvenue, <?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?> </h2>
    </header>
    <main >
      <?php
        if($_SESSION['isTeacher']){
          require('teacher/_teacherMain.php');
        }else{
          require('student/_studentMain.php');
        }
      ?>
    </main>

  </body>
</html>
