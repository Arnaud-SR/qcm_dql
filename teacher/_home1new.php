<?php
$qcmNoPublished = QCM::getQcmList();
$qcmPublished = QCM::getQcmList(1);
$qcmList = QCM::getAllQcm();
?>
<div class="container mt-5 d-flex align-items-start justify-content-center">

  <div class="card list-group bg-info p-3 mr-5" id="todo">
    <h2 class="text-center text-white">QCM non publiés</h2>
    <?php
    foreach ($qcmNoPublished as $qcm) {
      $questions = $qcm->getQuestions();
      $questionsJson = json_encode($questions);
      $teacher = QCM::getTeacherName($qcm->id_teacher);
      $teacherName = $teacher[0]->prenom." ".$teacher[0]->nom;
      echo
      "<div class='card'>
      <div class='card-body'>
        <div class='mb-1 text-right'>#$qcm->id_qcm</div>
          <h5 class='card-title text-dark'>{$qcm->title}</h5>
          <h6 class='card-subtitle mb-2 text-dark mb-1'> Date limite: <br>{$qcm->date_limit}</h6>
          <h6 class='card-subtitle mb-2 text-muted'> Auteur: {$teacherName}</h6>
          <h6 class='card-subtitle mb-2 text-muted'> Date de création: <br>{$qcm->created_at}</h6>
          <div class='d-flex justify-content-between mt-3'>
            <button class='btn btn-primary modal_qcm_detail' data-toggle='modal' data-target='#_qcm_modal' data-questions='{$questionsJson}' data-title='{$qcm->title}' data-teacher-name='{$teacherName}'>Détail du QCM</button>
          </div>
        </div>
      </div>";
    }
    ?>
  </div>
  <div class="card list-group bg-info p-3 mr-5" id="done">
    <h2 class="text-center text-white">QCM publiés</h2>
    <?php
    foreach ($qcmList as $qcm) {
      $questions = $qcm->getQuestions();
      $questionsJson = json_encode($questions);
      $is_visible = $qcm->is_published ? 'fas fa-eye text-success' : 'fas fa-eye-slash text-danger';
      $teacher = QCM::getTeacherName($qcm->id_teacher);
      $teacherName = $teacher[0]->prenom." ".$teacher[0]->nom;
      echo
      "<div class='card'>
      <div class='card-body'>
      <div class='justify-content-between'>
        <div class='mb-1'>#$qcm->id_qcm</div>
        <div scope='col-sm' class='text-center'><a href=''><a href='published-qcm.php?qcm={$qcm->id_qcm}'><span class='{$is_visible}' alt='rendre ce QCM visible par les étudiants'></a></span></div>

      </div>
          <h5 class='card-title text-dark'>{$qcm->title}</h5>
          <h6 class='card-subtitle mb-2 text-danger mb-1'> Date limite: <br>{$qcm->date_limit}</h6>
          <h6 class='card-subtitle mb-2 text-muted'> Auteur: {$teacherName}</h6>
          <h6 class='card-subtitle mb-2 text-muted'> Date de création: <br>{$qcm->created_at}</h6>
          <div class='d-flex justify-content-between mt-3'>
            <button class='btn btn-primary modal_qcm_detail' data-toggle='modal' data-target='#_qcm_modal' data-questions='{$questionsJson}' data-title='{$qcm->title}' data-teacher-name='{$teacherName}'>Détail du QCM</button>
          </div>
        </div>
      </div>
      ";
    }
   ?>
  </div>

  <div class="card list-group bg-info p-3 mr-5" id="done">
    <h2 class="text-center text-white">QCM terminés</h2>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-dark">Controle PHP DUT 2ème année</h5>
        <h6 class="cad-subtitle mb-2 text-muted"> Date de publication: 23/11/2018</h6>
        <h6 class="cad-subtitle mb-2 text-danger"> Date limite: 28/11/2018</h6>
        <div class="d-flex justify-content-between mt-3">
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#r_results_modal">Résultats</button>
        </div>
      </div>
      <?php require 'modals/_results_modal.php'; ?>
    </div>
  </div>

</div>

<?php require 'modals/_qcm_modal.php'; ?>
<script type="text/javascript">
$(document).ready(function () {
  $('.modal_qcm_detail').click(function () {
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
});
</script>
