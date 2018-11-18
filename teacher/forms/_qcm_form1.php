<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="assets/js/form.js"></script>
  </head>
  <body>
    <form id="_qcm_form" class="mb-5" method="post">
      <h2 class="col-sm-6 mt-5 mb-5">Nouveau QCM</h2>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label text-right">Titre du QCM</label>
        <div class="col-sm-9">
          <input  class="form-control" name="qcm_title" >
        </div>
      </div>
      <div class="container" id="researchBlock" >
        <div class="input-group mb-5 mt-5 d-flex justify-content-center">
          <label class="col-sm-3 col-form-label text-right">Rechercher des questions:</label>
          <div class="col-sm-3">
            <select class="form-control mr-5" title="theme" name="select_theme1" required>
              <option  disabled selected>choisir un thème</option>
              <option value="0">Programmation web</option>
              <option value="1">Réseau</option>
            </select>
          </div>
          <input type="text" class="form-control col-sm-3 ml-5" placeholder="Rechercher" aria-label="rechercher" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-info" type="button" id="button-addon21">OK</button>
          </div>
      </div>
      </div>
      <div id="block_questions_list" class="container mb-5" >
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Thème</th>
              <th scope="col">Intitulé de la question</th>
              <th scope="col">Question(s) ajoutée(s)</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row" class="col-sm-3">
                Programmation web
              </th>
              <th scope="row" class="col-sm-9">
                Quelle fonction retourne le nombre de secondes écoulées depuis le 1er janvier 1970 ?  </div>
              </th>
              <th scope="row" class="form-check">
                <input type="checkbox" name="" >
              </th>
              <th scope="row" >
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#questionModal">
                  consulter
                </button>
                //_display_question_modal
              </th>
            </tr>
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-outline-success btn-lg mt-5 mr-5" name="submitQCM">Envoyer</button>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-info btn-lg mt-5" name="previewQCM" data-toggle="modal" data-target="#previewModal">Aperçu</button>
        </div>
        //display_qcm_modal
      </div>
    </form>

  </body>
</html>
