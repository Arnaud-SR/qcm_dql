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
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Crée le</th>
          <th>Enseignant</th>
          <th>Date limite</th>
          <th style="width: 175px">Intitulé</th>
          <th class="text-center">Nombre de question</th>
          <th class="text-center">Résultats</th>
          <th class="text-center">Détails</th>
          <th>Visiblité</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($qcmList as $qcm) {
          $nbQuestions = QCM::countNbQuestions($qcm->id_qcm);
          $questions = $qcm->getQuestions();
          $questionsJson = json_encode($questions);

          $is_visible = $qcm->is_published ? 'fas fa-eye text-success' : 'fas fa-eye-slash text-danger';
          $teacher = QCM::getTeacherName($qcm->id_teacher);
          $teacherName = $teacher[0]->prenom." ".$teacher[0]->nom;

          echo "<tr>
          <td>$qcm->id_qcm</td>
          <td>{$qcm->created_at}</td>
          <td>{$teacherName}</td>
          <td>{$qcm->date_limit}</td>
          <td>{$qcm->title}</td>
          <td class='text-center'>$nbQuestions</td>
          <td><span class='btn btn-primary' data-toggle='modal' data-target='#_results_modal'>Voir les résultats</span></td>
          <td><span class='btn btn-info modal_qcm_detail' data-toggle='modal' data-target='#_qcm_modal' data-questions='{$questionsJson}' data-title='{$qcm->title}' data-teacher-name='{$teacherName}'>Détail du QCM</span></td>
          <td class='text-center'><a href=''><a href='published-qcm.php?qcm={$qcm->id_qcm}'><span class='{$is_visible}' title='rendre ce QCM visible par les étudiants'></a></span>
          </td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<?php
require 'modals/_qcm_modal.php';
require 'modals/_results_modal.php';
?>

<script>
$(document).ready(function () {
  $('.modal_qcm_detail').click(function () {
    let qcm_title = $(this).data('title');
    let questionsArray = $(this).data('questions');
    let authorName = $(this).data('teacher-name');
    let html = '';
    (questionsArray.questions).forEach(function (e, i) {
      var responsesHtml = '';
      /* (questionsArray.responses).forEach(function (e, i) {
      responsesHtml += `${e.response + " "}`;
    }); */
    html += `${e.content}<br>`;
  });
  $('#modal_qcm_title').html(qcm_title);
  $('#modal_qcm_teacher_name').html(authorName);
  $('#questions_modal_qcm').html(html);

});
})
;
</script>
