<?php
$qcmNoPublished = QCM::getQcmList();
$qcmPublished = QCM::getQcmList(1);
$qcmList = QCM::getAllQcm();
?>
<div class="card mt-2">
  <div class="card-header">
    <h2>Liste des QCM</h2>
  </div>
  <div class="card-body">
    <div class="container ">
      <div class ="container">
        <div class="row d-flex justify-content-between">
          <div class="col" >ID</div>
          <div class="col" >Crée le</div>
          <div class="col" >Enseignant</div>
          <div class="col" >Date limite</div>
          <div class="col" >Intitulé</div>
          <div class="col" class="text-center">Nombre de question</div>
          <div class="col" class="text-center">Résultats</div>
          <div class="col" class="text-center">Détails</div>
          <div>Visiblité</div>
        </div>
      </div>
      <div class="container">
        <?php
        foreach ($qcmList as $qcm) {
          $nbQuestions = QCM::countNbQuestions($qcm->id_qcm);
          $questions = $qcm->getQuestions();
          $questionsJson = json_encode($questions);

          $is_visible = $qcm->is_published ? 'fas fa-eye text-success' : 'fas fa-eye-slash text-danger';
          $teacher = QCM::getTeacherName($qcm->id_teacher);
          $teacherName = $teacher[0]->prenom." ".$teacher[0]->nom;

            echo
            "<div class='row container d-flex justify-content-between'>
              <div class='col'>$qcm->id_qcm</div>
              <div class='col'>{$qcm->created_at}</div>
              <div class='col'>{$teacherName}</div>
              <div class='col'>{$qcm->date_limit}</div>
              <div class='col'>{$qcm->title}</div>
              <div class='col' class='text-center'>$nbQuestions</div>
              <div class='col'><span class='btn btn-info modal_qcm_detail'>Résultats</span></div>
              <div class='col'><span class='btn btn-primary modal_qcm_detail' data-toggle='modal' data-target='#_qcm_modal' data-questions='{$questionsJson}' data-title='{$qcm->title}' data-teacher-name='{$teacherName}'>Détail du QCM</span></div>
              <div class='col' class='text-center'><a href=''><a href='published-qcm.php?qcm={$qcm->id_qcm}'><span class='{$is_visible}' title='rendre ce QCM visible par les étudiants'></a></span></div>
            </div>
            <div id='result' class='d-none'>
            <h6>Résultats pour le QCM : Titre du QCM</h6>
            <table class='table'>
              <thead>
                <tr>
                  <th scope='col'>#</th>
                  <th scope='col'>Nom</th>
                  <th scope='col'>Prénom</th>
                  <th scope='col'>Résultat</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope='row'>1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>19/20</td>
                </tr>
                <tr>
                  <th scope='row'>1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>19/20</td>
                </tr>
              </tbody>
            </table>
            </div>
            ";
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
require 'modals/_qcm_modal.php';
require 'modals/_results_modal.php';
?>

<script>
$(document).ready(function () {
  let qcmDetailsBtn = $('.btn-primary.modal_qcm_detail');
  let qcmResultsBtn = $('.btn-info.modal_qcm_detail');

  qcmDetailsBtn.click(function () {
    let qcm_title = $(divis).data('title');
    let questionsArray = $(divis).data('questions');
    let audivorName = $(divis).data('teacher-name');
    let html = '';
    (questionsArray.questions).forEach(function (e, i) {
      var responsesHtml = '';
      /* (questionsArray.responses).forEach(function (e, i) {
      responsesHtml += `${e.response + " "}`;
    }); */
    html += `${e.content}<br>`;
  });
  $('#modal_qcm_title').html(qcm_title);
  $('#modal_qcm_teacher_name').html(audivorName);
  $('#questions_modal_qcm').html(html);

});
toggleBlock(qcmResultsBtn,$('#result'));
});
function toggleBlock(displayBtnSel, matchedElSel) {
    displayBtnSel.on('click', function(){
        matchedElSel.find(this);
        matchedElSel.toggleClass('d-none');
    })
}
</script>
