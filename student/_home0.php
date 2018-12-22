<?php
$qcmToDo = QCM::getQcmList(1);
$qcmFinished = QCM::getQcmFinished();
?>
<div class="container mt-5 d-flex align-items-start justify-content-center">

  <div class="card list-group bg-info p-3 mr-5" id="done">
    <h2 class="text-center text-white">À rendre</h2>
    <?php
    foreach ($qcmToDo as $qcm_waiting) {
        $is_publicated = Results::isAlreadySubmittedByStudent($qcm_waiting->getIdQcm());
        if ($is_publicated) {
            continue;
        } else {
            echo "<div class='card mb-5'>
      <div class='card-body'>
      <h5 class='card-title text-dark'>{$qcm_waiting->getTitle()}</h5>
      <h6 class='cad-subtitle mb-2 text-muted'> Date de publication: {$qcm_waiting->getCreatedAt()}</h6>
      <h6 class='cad-subtitle mb-2 text-danger'> Date limite: {$qcm_waiting->getDateLimit()}</h6>
      <div class='d-flex justify-content-between mt-3'>
      {$qcm_waiting->checkDateLimit()}
      </div>
      </div>
      </div>";
        }
    } ?>

  </div>


  <div class="card list-group bg-secondary p-3" id="on_file">
    <h2 class="text-center text-white">Mes résultats</h2>
    <?php
    foreach ($qcmFinished as $finished_qcm) {
        $isPublicated = $finished_qcm->is_publicated ? $finished_qcm->result."/20" : "En attente de résultat";
      echo "
      <div class='card mb-5'>
      <div class='card-body'>
      <h5 class='card-title text-dark'>{$finished_qcm->title}</h5>
      <h6 class='cad-subtitle mb-2 text-muted'> Date de publication: {$finished_qcm->created_at}</h6>
      <h6 class='cad-subtitle mb-2 text-dark'> $isPublicated  </h6>
      <div class='d-flex justify-content-between mt-3'>
      </div>
      </div>
      </div>";
    } ?>

  </div>

</div>

<?php require 'modals/_qcm_modal.php'; ?>
