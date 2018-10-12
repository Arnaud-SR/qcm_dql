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
      <div class="container-fluid navbar-nav" style="border-style: dashed;position: fixed;height:80px;width:100vw; ">
        logo<h1>Gestionnaire QCM</h1>
      </div>
    </header>
    <main>
      <div class="container" style="border-style:dashed; width: 300px; height: 800px; position: fixed; left:0; right:auto;margin-top:80px;">
          menu
      </div>
      <div class="container-fluid" style="border-style:dashed;margin-left:300px;height:100vh;position: fixed;margin-top:80px;margin-left:300px;">
        <header class="row" style="border-style:dashed;height:100px;position:fixed;width:100%;">
          <h2>Vous êtes l'enseignant/étudiant <?php  echo '$_SESSION[]'; ?></h2>
        </header>
        <div class="row" >

            <div class="card" style="width: 100%;margin-top:100px;">
              <div class="card-header">
                <h3>Vos QCM</h3>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Vestibulum at eros</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </main>


  </body>
</html>
