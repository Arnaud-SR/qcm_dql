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
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
