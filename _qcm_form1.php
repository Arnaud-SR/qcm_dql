<?php
$questionArray = Question::getAllQuestions();
$thematics = Question::getAllThematics();
?>

<form method="post" id="_qcm_form" class="mb-5">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label text-right">Titre du QCM</label>
          <div class="col-sm-9">
            <input class="form-control" name="qcm_title" required>
        </div>
      </div>
        <div class="container" id="researchBlock">
        <div class="input-group mb-5 mt-5 d-flex justify-content-center">
            <label class="col-sm-3 col-form-label text-right">Rechercher des questions:</label>
                <div class="col-sm-3">
                    <select class="form-control mr-5" title="theme" name="select_theme1" id="select_thematics" required>
                        <option value="all" selected>Tous</option>
                        <?php
                        foreach ($thematics as $thematic) {
                            echo "<option value='$thematic'>$thematic</option>";
                        }
                        ?>
                    </select>
                </div>
        </div>
      </div>

    <div class="container mb-5">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Thème</th>
              <th scope="col">Intitulé de la question</th>
              <th scope="col">Question(s) ajoutée(s)</th>
              <th scope="col"></th>
            </tr>
          </thead>
            <tbody id="block_questions_list">
          <?php
          foreach ($questionArray as $q) {
              $responses = $q->getResponses();
              $author = Question::getAuthor($q->getIdTeacher());
              $authorName = $author[0]->prenom." ".$author[0]->nom;

              //On JSONise le tableau pour qu'il soit passable à la modal via la JS
              $responsesJson = json_encode($responses);
              echo "<tr class='{$q->getTheme()} tr_theme'>
              <td scope='row' class='col-auto'>
                {$q->getTheme()}
              </td>
              <td scope='row' class='col-sm-9'>
                {$q->content}
              </td>
              <td scope='row' class='form-check'>
                <input class='questions' type='checkbox' name='add_question[]' value='{$q->getIdQuestion()}'>
              </td>
              <td scope='row'>
                <button type='button' class='btn btn-info btn-sm modal_question' data-toggle='modal' data-target='#_question_modal' data-id='{$q->getIdQuestion()}' data-title='{$q->content}' data-id_teacher='{$q->getIdTeacher()}' data-theme='{$q->getTheme()}' data-author_name='$authorName' data-responses='$responsesJson'>
                  consulter
                </button>";
              "</td>
            </tr>";
            include('modals/_question_modal.php');

          }

          ?>

          </tbody>
        </table>
      </div>
    <div class="row">
        <div class="col-12">
            <label>A rendre avant le : <input type="date" name="date_limit_qcm" required></label>
        </div>
    </div>
        <div class="d-flex justify-content-center">
            <input type="submit" value="envoyer" class="btn btn-success btn-lg mt-5 mr-5" name="submitQCM">
        </div>

        <?php
       ?>
    </form>
<script>
    $(document).ready(function () {
        displayErrorQcm();
        displayByThematics();
        $('.modal_question').on('click', function () {
            let questionId = $(this).data('id');
            let teacher_fullName = $(this).data('author_name');
            let questionTheme = $(this).data('theme');
            let responsesArray = $(this).data('responses');
            let questionTitle = $(this).data('title');
            let html = '';

            $.get("dashBoard.php",{idQuestion: questionId});

            // En gros, au click, on charge toutes les données en data-attribute et pour les réponses on fait une boucle dessus
            responsesArray.forEach(function (e, answerIndex) {
                let is_correct = e.is_correct == 1 ? '✅' : '';

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
                html += "<tr ><th scope='row'>" +
                        answerIndex +
                        "</th><th scope='row' class='col-sm-8'>" +
                        e.response +
                        "</th><th scope='row' class='form-check'>"+is_correct+"</th></tr>"
            });
            $('#question_label_modal').html('Question #' + questionId);
            $('#question_teacher_modal').html(teacher_fullName);
            $('#question_content_modal').html(questionTitle);
            $('#question_theme_modal').html(questionTheme);
            $('#table-response').html(html);

        });
        $('#select_thematics').on('change', function () {
            $('#form_search_thematics').submit();
        })
        $('.modal-footer').find('button').on('click', function () {
            $('.modal-content').replaceWith("<form class='modal-content' action='' method='post' id='form_modify_question'>" + $('.modal-content').html() + "</form>");

            let questionContentModal =  $('#question_content_modal').text();
            let answerTitleTab = new Array();

            $('#question_content_modal').replaceWith('<textarea class="form-control col-sm-11 mb-5 mx-auto" name="question_title_u" type="text" rows="2" id="modify_question_title_input">');
            $('textarea').attr('placeholder',questionContentModal);
            $(this).prop("disabled",true);
            $('#table-response').find('tr').each(function (index) {
                answerTitleTab[index] = $('#table-response').find('tr:nth-child(' + (index+1) + ') > th:nth-child(2)').text();
            })
            $('#table-response').find('th.col-sm-8').html('<input class="form-control col-sm-11" value="" type="text" name="">');
            $('#table-response').find('input').each(function(index){
                this.name = 'response_title_' + (index+1) ;
                this.value = answerTitleTab[index];
            });
            $('#table-response').find('th.form-check').html('<input class="form-control" name="" type="checkbox">');
            $('#table-response').find('[type="checkbox"]').each(function(index){
                this.name = 'response_cb_' + (index+1) ;
            });
            $('.form-control').on('click', function () {
                $('.modal-footer').html('<button type="submit"  name="submitSetQuestion" class="btn btn-success" >Envoyer</button>');
            });
            $('#form_modify_question').on('submit', function () {
                let content = $('#modify_question_title_input').val();
                $.get("dashBoard.php", {content_modify_question: content});
            })
        })

    });

    function displayByThematics() {
        var select = $('#select_thematics');
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

    function displayErrorQcm() {
        $('#_qcm_form').submit(function (e) {
            if ($('.questions:checkbox:checked').length < 1) {
                e.preventDefault();
                alert('Veuillez séléctionnez au moins une question à ajouter au QCM !');
            }
        });
    }
</script>
