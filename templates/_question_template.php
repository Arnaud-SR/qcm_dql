<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <script src="assets/js/question.js"></script>
</head>
<body>
  <div class="container p-4" style="background-color: #c2d2ce1a;">
    <header>
      <div class="form-group row d-flex justify-content-between font-italic">
        <div >
          Broisin Julien
        </div>
        <div >
          Programmation web
        </div>
      </div>
    </header>
    <main>
      <span class="form-group row">
        <h5 class="mb-5">Question ##. </h5>
        Quelle fonction retourne le nombre de secondes écoulées depuis le 1er janvier 1970 ?
      </span>
      <hr>
      <h4>Réponses</h4>
      <table class="table table-borderless">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Intitulé de la question</th>
            <th scope="col">V/F</th>
          </tr>
        </thead>
        <tbody>
          <tr id="A">
            <th scope="row">A.</th>
            <th scope="row" class="col-sm-8">
              time
            </th>
            <th scope="row" class="form-check">
              <input name="cb_a" type="checkbox" disabled>
            </th>
          </tr >
          <tr id="B">
            <th scope="row">B.</th>
            <th scope="row" class="col-sm-8">
              timestamp
            </th>
            <th scope="row" class="form-check">
              <input name="cb_b" type="checkbox" disabled>
            </th>
          </tr>
          <tr id="C">
            <th scope="row">C.</th>
            <th scope="row" class="col-sm-8">
              mktim
            </th>
            <th scope="row" class="form-check">
              <input name="cb_c" type="checkbox" disabled>
            </th>
          </tr>
          <tr id="D">
            <th scope="row">D.</th>
            <th scope="row" class="col-sm-8">
              microtime
            </th>
            <th scope="row" class="form-check">
              <input  name="cb_d" type="checkbox" disabled>
            </th>
          </tr>
        </tbody>
      </table>
    </main>
    <footer>

    </footer>
  </div>

</body>
</html>
