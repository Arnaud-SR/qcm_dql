<?php
require './class/cfg.php';
$questionArray = Question::getAllQuestions();
$thematics = Question::getAllThematics();
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
            <form method="post" id="form_search_thematics">
                <label class="col-sm-3 col-form-label text-right">Rechercher des questions:</label>
                <div class="col-sm-3">
                    <select class="form-control mr-5" title="theme" name="select_theme1" id="select_thematics" required>
                        <option value="all" selected>Tous</option>
                        <?php
                        foreach ($thematics as $thematic) {
                            echo "<option value='$thematic->theme'>$thematic</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="text" class="form-control col-sm-3 ml-5" placeholder="Rechercher" aria-label="rechercher"
                       aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-info" type="button" id="button-addon21">OK</button>
                </div>
                <input type="submit" value="Rechercher">
            </form>
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
              $responses = $q->getResponses();
              $author = Question::getAutor($q->id_teacher);
              $authorName = $author[0]->prenom." ".$author[0]->nom;

              //On JSONise le tableau pour qu'il soit passable à la modal via la JS
              $responsesJson = json_encode($responses);
              echo "<tr class='$q->theme tr_theme'>
              <td scope='row' class='col-auto'>
                {$q->theme}
              </td>
              <td scope='row' class='col-sm-9'>
                {$q->content}
              </td>
              <td scope='row' class='form-check'>
                <input type='checkbox' name='' >
              </td>
              <td scope='row'>
                <button type='button' class='btn btn-info btn-sm modal_question' data-toggle='modal' data-target='#r_question_modal' data-title='$q->content' data-id_teacher='$q->id_teacher' data-theme='$q->theme' data-author_name='$authorName' data-responses='$responsesJson'>
                  consulter
                </button>";
              "</td>
            </tr>";
          } 
          include('modals/_r_question_modal.php');

          ?>

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
        displayByThematics();
        $('.modal_question').on('click', function () {
            let teacher_fullName = $(this).data('author_name');
            let questionTheme = $(this).data('theme')
            let responsesArray = $(this).data('responses');
            let questionTitle = $(this).data('title');
            let html = '';

            // En gros, au click, on charge toutes les données en data-attribute et pour les réponses on fait une boucle dessus
            responsesArray.forEach(function (e, answerIndex) {
                switch (answerIndex){
                    case 0:
                        answerIndex = 'A.';
                        break;
                    case 1:
                        answerIndex = 'B.';
                        break;
                    case 2:
                        answerIndex = 'C.';
                        break;
                    case 3:
                        answerIndex = 'D.';
                        break;
                    default:
                        break;
                }
                html += "<tr> <th scope='row'>" +
                        answerIndex +
                        "</th><th scope='row' class='col-sm-8'>" +
                        e.response +
                        "</th><th scope='row' class='form-check'><input type='checkbox' disabled>" +
                        e.is_correct +
                        "</th></tr >"
            });

            $('#question_teacher_modal').html(teacher_fullName);
            $('#question_content_modal').html(questionTitle);
            $('#question_theme_modal').html(questionTheme);
            $('#table-response').html(html);

        });
        $('#select_thematics').on('change', function () {
            $('#form_search_thematics').submit();
        })
    });

    function hideQuestion(selectedOption, matchedQuestion) {
        selectedOption.on('click', function () {
            matchedQuestion.find(this);
            matchedQuestion.addClass('d-none');
        })
    }

    function displayByThematics() {
        var select = $('#select_thematics');
        var block = $('#tbody_list_questions');
        var theme = $('.tr_theme');
        select.on('change', function () {
            var selected = $('#select_thematics option:selected').text();
            $('.tr_theme').removeClass('d-none');
            theme.each(function (i, b) {
                var content_class = $(this).attr('class');
                if (selected == "Tous") {
                    $(this).removeClass('d-none');
                } else if (!(content_class.includes(selected))) {
                    $(this).addClass('d-none');
                }
            });

        })
    }
</script>
