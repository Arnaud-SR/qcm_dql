<?php
require('class/cfg.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="assets/js/form.js"></script>
  </head>
  <body>
    <form id="new_question_form" class="container mb-5" method="post">
      <h2 class="col-sm-3 mb-5">Question</h2>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label text-right">Thème de la question</label>
        <div class="col-sm-3">
          <select class="form-control" title="theme" name="select_theme" required>
            <option  disabled selected value="">choisir un thème</option>
            <option value="<?= Thematics::HIST ?>">Mathématiques</option>
            <option value="<?= Thematics::ENG ?>">Anglais</option>
            <option id="<?= Thematics::HIST ?>">Histoire</option>
          </select>
        </div>
        <div class="col-sm-4 input-group mb-3 d-none" id="other_option_block">
          <input type="text" id="new_theme" class="form-control"  name="new_theme" placeholder="Nouveau thème" >
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">ok</button>
          </div>
        </div>

      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label text-right">Intitulé de la question</label>
        <div class="col-sm-9">
          <input  class="form-control" name="question_title" required>
        </div>
      </div>
      <div id="block_new_answers" class="container mb-5" >
        <hr class="mb-5 mt-5">
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
                <input  class="form-control" name="response_a_title" required>
              </th>
              <th scope="row" class="form-check">
                <input  class="" type="checkbox" name="a_is_correct" >
              </th>
            </tr>
            <tr>
              <th scope="row">B.</th>
              <th scope="row" class="col-sm-8">
                <input  class="form-control" name="response_b_title" required>
              </th>
              <th scope="row" class="form-check">
                <input  class="" type="checkbox" name="b_is_correct" >
              </th>
            </tr>
            <tr>
              <th scope="row">C.</th>
              <th scope="row" class="col-sm-8">
                <input  class="form-control" name="response_c_title" >
              </th>
              <th scope="row" class="form-check">
                <input  class="" type="checkbox" name="c_is_correct" >
              </th>
            </tr>
            <tr>
              <th scope="row">D.</th>
              <th scope="row" class="col-sm-8">
                <input  class="form-control" name="response_d_title" >
              </th>
              <th scope="row" class="form-check">
                <input  class="" type="checkbox" name="d_is_correct" >
              </th>
            </tr>
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          <input type="submit" class="btn btn-outline-success btn-lg mt-5" name="submitQuestion" value="Envoyer">
        </div>
      </div>
    </form>
  </body>
</html>

</html>
