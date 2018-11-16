<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <script src="assets/js/teacherMain.js"></script>
</head>
<body>
  <div class="container mt-5">
    <div>
      <button type="button" id="btn_noPublished_QCM_list" class="btn btn-outline-primary btn-lg btn-block mb-5">Mes QCM non publiés</button>
    </div>
    <div id="block_noPublished_QCM_list" class="mb-5 d-none" >
      <h2 class="col-sm-6 mt-5 mb-5">Mes QCM non publiés</h2>
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
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#previewQCMModal">
                Aperçu
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <hr>
    </div>
  </div>

  <div class="container mt-5">
    <div>
      <button type="button" id="btn_published_QCM_list" class="btn btn-outline-primary btn-lg btn-block mb-5">Mes QCM publiés</button>
    </div>
    <div class="d-none" id="block_published_QCM_list">
      <h2 class="col-sm-6 mt-5 mb-5">Mes QCM publiés</h2>
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
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#previewQCMModal">
                Aperçu
              </button>
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
</body>
</html>
