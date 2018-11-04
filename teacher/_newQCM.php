<!DOCTYPE html>
<html>
    <head>
        <?php require_once 'head.php' ?>
        <script src="assets/js/newQCM.js"></script>
    </head>
    <body>
      <div class="container mt-5" >
        <div id="create_newQuestion" class="container mb-5" >
          <div >
              <button type="button" id="newQuestion_button" class="btn btn-outline-primary btn-lg btn-block mb-5">Déposer une question</button>
          </div>
          <form id="block_newQuestion" class="container mb-5" method="post">
              <h2 class="col-sm-3 mb-5">Question</h2>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Thème de la question</label>
                <div class="col-sm-3">
                  <select class="form-control " required title="theme" id="select_theme" name="select_theme">
                    <option value="" disabled selected>choisir un thème</option>
                    <option value="0">Programmation web</option>
                    <option value="1">Réseau</option>
                    <option value="2">Autre</option>
                  </select>
                </div>
                <label class="col-sm-1 col-form-label"> ou </label>
                <input  class="col-sm-3 form-control mb-2 mr-sm-2" name="newTheme" placeholder="Nouveau thème" >
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Intitulé de la question</label>
                <div class="col-sm-9">
                  <input  class="form-control" name="question_title" required>
                </div>
              </div>
              <!-- TODO: insérer spinner -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Nombre de réponses</label>
                <div class="col-sm-1">
                  <input  class="form-control" name="nb_answer" required>
                </div>
                <label class="col-sm-3 col-form-label font-italic" >Min 2 - Max 6</label>
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-info mt-5">Déposer mes réponses</button>
              </div>
          </form>
          <form id="newAnswers" class="container mb-5" method="post">
              <h2 class="col-sm-3 mb-5">Réponses</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Intitulé de la réponse</th>
                    <th scope="col">Bonne(s) réponse(s)</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">A.</th>
                    <th scope="row" class="col-sm-8">
                      <input  class="form-control" name="answer_a_title" required>
                    </th>
                    <th scope="row" class="form-check">
                      <input  class="" type="checkbox" name="answer_a_value" id="answer_a" >
                    </th>
                  </tr>
                  <tr>
                    <th scope="row">B.</th>
                    <th scope="row" class="col-sm-8">
                      <input  class="form-control" name="answer_a_title" required>
                    </th>
                    <th scope="row" class="form-check">
                      <input  class="" type="checkbox" name="answer_b_value" id="answer_b" >
                    </th>
                  </tr>
                </tbody>
              </table>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-outline-success btn-lg mt-5">Déposer ma question</button>
            </div>
          </form>
        </div>


        </div>

      </div>








    </body>
</html>
