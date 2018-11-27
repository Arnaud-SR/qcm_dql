<div class="container mt-5 d-flex align-items-start justify-content-center">
  <div class="card list-group bg-info p-3 mr-5" id="todo">
    <h2 class="text-center text-white">Nouveau</h2>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-dark">Controle PHP DUT 2ème année</h5>
        <h6 class="cad-subtitle mb-2 text-muted"> Date de publication: 23/11/2018</h6>
        <h6 class="cad-subtitle mb-2 text-dark"> Date limite: 28/11/2018</h6>
        <div class="d-flex justify-content-between mt-3">
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#r_qcm_modal">Aperçu</button>
          <button type="button" class="btn btn-info btn-sm">Commencer</button>
        </div>
        <?php require 'modals/_qcm_modal.php'; ?>
      </div>

    </div>

  </div>
  <div class="card list-group bg-info p-3 mr-5" id="done">
    <h2 class="text-center text-white">À rendre</h2>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-dark">Controle PHP DUT 2ème année</h5>
        <h6 class="cad-subtitle mb-2 text-muted"> Date de publication: 23/11/2018</h6>
        <h6 class="cad-subtitle mb-2 text-danger"> Date limite: 28/11/2018</h6>
        <div class="d-flex justify-content-between mt-3">
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#r_qcm_modal">Aperçu</button>
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#r_results_modal">Envoyer</button>
        </div>
      </div>
      <?php require 'modals/_qcm_modal.php'; ?>
      <?php require 'modals/_results_modal.php'; ?>
    </div>
  </div>

  <div class="card list-group bg-secondary p-3" id="on_file">
    <h2 class="text-center text-white">Mes résultats</h2>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-dark">Controle PHP DUT 2ème année</h5>
        <h6 class="cad-subtitle mb-2 text-muted"> Date de rendu: 13/11/2018</h6>
        <h6 class="cad-subtitle mb-2 text-dark"> Note: 18/20</h6>
        <div class="d-flex justify-content-between mt-3">
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#r_qcm_modal">Aperçu</button>
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#r_qcm_modal">Feedback</button>
        </div>
      </div>
      <?php require 'modals/_qcm_modal.php'; ?>
    </div>
  </div>

</div>
