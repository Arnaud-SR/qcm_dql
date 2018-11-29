<?php
require './class/cfg.php';
$questionArray = Question::getAllQuestions();
?>

    <form id="_qcm_form" class="mb-5" method="post">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label text-right">Titre du QCM</label>
        <div class="col-sm-9">
          <input  class="form-control" name="qcm_title" >
        </div>
      </div>

        <div class="container" id="researchBlock">
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
            <button class="btn btn-info" type="button" id="button-addon21">OK</button>
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
          <?php
          foreach ($questionArray as $q) {
              $responses = Response::getResponses($q->id_question);
              $author = Question::getAutor($q->id_teacher);
              $authorName = $author[0]->prenom." ".$author[0]->nom;
            echo "<tr>
              <td scope='row' class='col-auto'>
                {$q->theme}
              </td>
              <td scope='row' class='col-sm-9'>
                {$q->content}
              </td>
              <td scope='row' class='form-check'>
                <input type='checkbox' name='' >
              </td>
              <td scope='row' >
                <button type='button' class='btn btn-info btn-sm modal_question' data-toggle='modal' data-target='#r_question_modal' data-question_id='$q->id_question' data-title='$q->content' data-id_teacher='$q->id_teacher' data-author_name='$authorName'>
                  consulter
                </button>";
              include_once('modals/_question_modal.php');
              "</td>
            </tr>";
            } ?>

          </tbody>
        </table>
      </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-success btn-lg mt-5 mr-5" name="submitQCM">Envoyer</button>
          <button type="button" class="btn btn-info btn-lg mt-5" data-toggle="modal" data-target="#r_qcm_modal">Aperçu</button>
        </div>

        <?php
        require('modals/_qcm_modal.php');
       ?>

    </form>
<script>
    $(document).ready(function () {
        $('.modal_question').on('click', function () {
            var teacher_fullName = $(this).data('author_name');

            $('#question_teacher_modal').html(teacher_fullName);
            $('#question_content_modal').html($(this).data('title'));
        })
    })
</script>
