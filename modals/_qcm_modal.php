<div class="modal fade" id="r_qcm_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg text-dark" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">#id</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-header font-weight-bold d-flex text-center">
              <h3 class="card-title" >Titre du QCM </h3>
          </div>
          <div class="card-body">
            <p class="card-text text-right">Date limite: XX/XX/XX</p>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <?php require('./templates/_question_template.php'); ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" >Publier</button>
      </div>
    </div>
  </div>
</div>
