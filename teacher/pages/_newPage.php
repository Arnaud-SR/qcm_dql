<!DOCTYPE html>
<html>
    <head>
        <script src="assets/js/index.js"></script>
    </head>
    <body>
      <div class="container mt-5" >
        <div >
          <button type="button" id="btn_buildQCM" class="btn btn-outline-primary btn-lg btn-block mb-5">Construire un QCM</button>
        </div>
        <div id="block_buildNewQCM" class="container mb-5 d-none" >
          <?php //require('_newQCM.php'); ?>
        </div>
        <div >
          <button type="button" id="btn_new_question" class="btn btn-outline-primary btn-lg btn-block mb-5">Déposer une question</button>
        </div>
        <div id="block_newQuestion" class="container mb-2 d-none" >
          <?php //require('_newQuestion.php'); ?>
        </div>

        </div>
      </div>
    </body>
</html>
