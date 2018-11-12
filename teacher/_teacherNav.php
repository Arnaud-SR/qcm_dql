<!DOCTYPE html>
<link rel="stylesheet" type="text/css">
<nav>
  <div class="row">
    <div class="col-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><h3>Home</h3></a>
        <a class="nav-link" id="v-pills-new-tab" data-toggle="pill" href="#v-pills-new" role="tab" aria-controls="v-pills-new" aria-selected="false"><h3>Nouveau</h3></a>
      </div>
    </div>
    <div class="col-9" style="height: 100vw;">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"> <?php require('_teacherMain.php') ?> </div>
        <div class="tab-pane fade" id="v-pills-new" role="tabpanel" aria-labelledby="v-pills-new-tab"> <?php require('_newPage.php'); ?></div>
      </div>
    </div>
  </div>
</nav>
