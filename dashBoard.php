<?php
require_once("class/cfg.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php require_once 'head.php'; ?>
    <title>Tableau de bord</title>
  </head>
  <body>
    <header class="container-fluid navbar-nav" style="border-style: dashed;height:80px;width:100vw; ">
        <h2> Gestionnaire de QCM enseignant/étudiant <?php  echo '$_SESSION[]'; ?></h2>
    </header>
    <main >
      <?php
      $isTeacher = false;
      if($isTeacher){
        require('_teacherNav.html');
      }else{
        require('_studentNav.html');
      }
        ?>

    </main>
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>

    <!-- Load our React component. -->
    <script src="like_button.js"></script>

  </body>
</html>
