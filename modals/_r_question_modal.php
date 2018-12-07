<div class="modal fade" id="r_question_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Consultation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container p-4" style="background-color: #c2d2ce1a;">
           <header>
             <div class="form-group row d-flex justify-content-between font-italic">
               <div id="question_teacher_modal">
               </div>
               <div id="question_theme_modal">
               </div>
             </div>
           </header>
           <main>
             <span class="form-group row">
               <h5 class="mb-5" id="question_content_modal"></h5>
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
               <tbody id="table-response">
               </tbody>
             </table>
           </main>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
