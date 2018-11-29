<div class="modal fade" id="r_question_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg text-dark" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Question mise en ligne par <span
                            id="question_teacher_modal"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col" id="question_content_modal" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody id="table-response">
                    <?php
                    /*  foreach ($array as $key => $response) {
                         echo "<tr>
                         <th scope='row'>$key</th>
                         <th scope='row' class='col-sm-8'>
                             $response->response
                         </th>
                     </tr>";
                     } */
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
