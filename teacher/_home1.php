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
  <div class="container">
    <?php
    foreach ($qcmList as $qcm) {
      $questions = $qcm->getQuestions();
      $questionsJson = json_encode($questions);
      $is_visible = $qcm->getisPublished() ? 'fas fa-eye text-success' : 'fas fa-eye-slash text-danger';
      $teacher = QCM::getTeacherName($qcm->getIdTeacher());
      $teacherName = $teacher[0]->prenom." ".$teacher[0]->nom;
      $studentsResults = QCM::getAllStudentResultsForOneQCM($qcm->getIdQcm());

      echo
      "<div class='bg-light border rounded p-3 mb-3'>
        <div class='container mb-3'>
          <div class='d-flex justify-content-between mb-4'>
            <div class=''>#{$qcm->getIdQcm()}</div>
            <div class='text-muted'> Rendre ce QCM visible/invisible pour les étudiants => <a href=''><a href='published-qcm.php?qcm={$qcm->getIdQcm()}'><span class='{$is_visible}'></a></span></div>
          </div>
          <div class='d-flex flex-column mt-3'>
            <h5 class='text-center'>{$qcm->getTitle()}</h5>
            <div class='text-center text-muted'>Crée le {$qcm->getCreatedAt()} par {$teacherName}</div>
            <div class='text-center'>Date limite: {$qcm->getDateLimit()}</div>
          </div>
          <div class='d-flex align-self-end justify-content-end mt-3'>
            <div><span class='btn btn-info modal_qcm_detail mr-4' data-id='{$qcm->getIdQcm()}'>Résultats</span></div>
            <div ><span class='btn btn-primary modal_qcm_detail' data-toggle='modal' data-target='#_qcm_modal' data-questions='{$questionsJson}' data-title='{$qcm->getTitle()}' data-teacher-name='{$teacherName}'>Détail du QCM</span></div>
          </div>
        </div>
        <div id='qcmResults{$qcm->getIdQcm()}' class='d-none' '>
          <table class='table'>
            <thead>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>Nom</th>
                <th scope='col'>Prénom</th>
                <th scope='col'>Résultat</th>
              </tr>
            </thead>
            <tbody>".$studentsResults."</tbody>
          </table>
        </div>
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
?>

<script>
$(document).ready(function () {
  let qcmDetailsBtn = $('.btn-primary');
  let qcmResultsBtn = $('.btn-info');

  qcmDetailsBtn.click(function () {
    let qcm_title = $(divis).data('title');
    let questionsArray = $(divis).data('questions');
    let authorName = $(divis).data('teacher-name');
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
qcmResultsBtn.on('click',function () {
  let resultsBtnId = $(this).data('id');
  let resultBlock = $('[id="qcmResults' + resultsBtnId + '"]');
  resultBlock.toggleClass('d-none');
})

});


</script>
