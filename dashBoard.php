<?php
require_once("class/cfg.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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
