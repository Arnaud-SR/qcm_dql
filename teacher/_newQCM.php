<!DOCTYPE html>
<html>
    <head>
        <?php require_once 'head.php' ?>
        <script src="assets/js/newQCM.js"></script>
    </head>
    <body>
        <div >
            <button id="link_newQuestion" class="btn btn-info">Déposer une question</button>
        </div>
        <div id="block_newQuestion">
          <form class="container" method="post">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label text-right">Thème de la question</label>
              <div class="col-sm-3">
                <select class="form-control " required title="theme" id="select_theme" name="select_theme">
                  <option value="" disabled selected>choisir un thème</option>
                  <option value="0">thème 1</option>
                  <option value="1">thème 2</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label text-right">Intitulé de la question</label>
              <div class="col-sm-9">
                <input  class="form-control" name="title" required>
              </div>
            </div>
            <!-- TODO: insérer spinner -->
            <div class="form-group row">
              <label class="col-sm-3 col-form-label text-right">Nombre de réponses</label>
              <div class="col-sm-1">
                <input  class="form-control" name="nb_answer" required>
              </div>
              <label class="col-sm-3 col-form-label font-italic" >Min 1 - Max 6</label>
            </div>



          </form>

        </div>



    </body>
</html>
