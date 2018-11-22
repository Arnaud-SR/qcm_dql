    <div class="container mt-5">
      <div class="d-flex justify-content-between mt-5 mb-5">
        <h2 class="col-sm-6">Mes QCM non publiés</h2>
        <button type="button" id="btn_noPublished_QCM_list" class="btn btn-outline-secondary btn-sm">-</button>
      </div>
      <div id="block_noPublished_QCM_list" class="mb-5" >
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Date de création</th>
              <th scope="col">Titre</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">13/11/2018</th>
              <td>Controle PHP DUT 2ème année</td>
              <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#r_qcm_modal">
                  Aperçu
                </button>
                <?php
                require('modals/_qcm_modal.php');
               ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <hr>
    </div>
    <div class="container mt-5">
      <div class="d-flex justify-content-between mt-5 mb-5">
        <h2 class="col-sm-6">Mes QCM publiés</h2>
        <button type="button" id="btn_published_QCM_list" class="btn btn-outline-secondary btn-sm">-</button>
      </div>
      <div id="block_published_QCM_list">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Date de création</th>
              <th scope="col">Titre</th>
              <th scope="col"></th>
              <th scope="col">Date de Publication</th>
              <th scope="col">Résultats</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">01/10/2018</th>
              <td>Controle bases réseau DUT 1ère année</td>
              <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#r_qcm_modal">
                  Aperçu
                </button>
                <?php
                require('modals/_qcm_modal.php');
               ?>
              </td>
              <td>23/11/2018</td>
              <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#previewResultsModal">
                  Résultats
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
