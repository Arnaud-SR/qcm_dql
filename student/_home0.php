<?php
$qcmPublished = QCM::getQcmList(1);
//var_dump($qcmPublished);

?>
<div class="container mt-5 d-flex align-items-start justify-content-center">
  <div class="card list-group bg-info p-3 mr-5" id="todo">
    <h2 class="text-center text-white">À lire</h2>
    <?php
    foreach ($qcmPublished as $qcm_todo) {
      echo "
      <div class='card mb-5'>
      <div class='card-body'>
      <h5 class='card-title text-dark'>{$qcm_todo->title}</h5>
      <h6 class='cad-subtitle mb-2 text-muted'> Date de publication: {$qcm_todo->created_at}</h6>
      <h6 class='cad-subtitle mb-2 text-dark'> Date limite: {$qcm_todo->date_limit}</h6>
      <div class='d-flex justify-content-between mt-3'>
      <button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#r_qcm_modal'>Aperçu</button>
      </div>
      </div>
      </div>";
    }
    ?>
  </div>

  <div class="card list-group bg-info p-3 mr-5" id="done">
    <h2 class="text-center text-white">À rendre</h2>
    <?php
    foreach ($qcmPublished as $qcm_waiting) {
      echo "<div class='card mb-5'>
      <div class='card-body'>
      <h5 class='card-title text-dark'>{$qcm_waiting->title}</h5>
      <h6 class='cad-subtitle mb-2 text-muted'> Date de publication: {$qcm_waiting->created_at}</h6>
      <h6 class='cad-subtitle mb-2 text-danger'> Date limite: {$qcm_waiting->date_limit}</h6>
      <div class='d-flex justify-content-between mt-3'>
      <button type='button' class='btn btn-info btn-sm '>Commencer</button>

      </div>
      </div>
      </div>";
    } ?>

  </div>


  <div class="card list-group bg-secondary p-3" id="on_file">
    <h2 class="text-center text-white">Mes résultats</h2>
    <?php
    foreach ($qcmPublished as $finished_qcm) {
      echo "
      <div class='card mb-5'>
      <div class='card-body'>
      <h5 class='card-title text-dark'>{$finished_qcm->title}</h5>
      <h6 class='cad-subtitle mb-2 text-muted'> Date de rendu: 13/11/2018</h6>
      <h6 class='cad-subtitle mb-2 text-dark'> Note: 18/20</h6>
      <div class='d-flex justify-content-between mt-3'>
      </div>
      </div>
      </div>";
    } ?>

  </div>

</div>

<?php require 'modals/_qcm_modal.php'; ?>
