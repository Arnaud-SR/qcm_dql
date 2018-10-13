<?php
require_once("class/cfg.php");
if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit;
}
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <?php require_once 'head.php' ?>
    <title>Tableau de bord</title>
  </head>
  <body>
    <header>
      <div class="container-fluid navbar-nav" style="border-style: dashed;height:80px; ">
        <h1>Bienvenue dans votre espace, <?php  echo '$_SESSION[]'; ?></h1>
      </div>
    </header>
    <main>
      <div class="container" style="border-style:dashed; width: 300px; height: 800px; position: fixed; left:0; right:auto;">
menu
      </div>
      <div class="container-fluid" style="border-style:dashed;margin-left:300px;">
        <header class="row">

        </header>
        <div class="row">
          <div style="margin: 30px 10vw;">
              <h3>Vos QCM</h3>
          </div>

        </div>
      </div>

    </main>


  </body>
</html>
