$(document).ready(function () {
    toggleBlock($('#btn_noPublished_QCM_list'), $('#block_noPublished_QCM_list'));
    toggleBlock($('#btn_published_QCM_list'), $('#block_published_QCM_list'));

    loadPageOnClick($('#btn_load_display_qcm_form'), $('#block_qcm_form'), 'forms/_qcm_form1.php');
    toggleBlock($('#btn_load_display_qcm_form'), $('#block_qcm_form'));

    loadPageOnClick($('#btn_load_display_question_form'), $('#block_question_form'), '_question_form1.php');
    toggleBlock($('#btn_load_display_question_form'), $('#block_question_form'));
});

function toggleBlock(displayBtnSel, matchedElSel) {
    displayBtnSel.on('click', function(){
        matchedElSel.find(this);
        matchedElSel.toggleClass('d-none');
    })
}

function loadPageOnClick(listenerSel,matchedElSel, pathname) {
  listenerSel.on('click',function(){
    matchedElSel.load(pathname);
    });
  }
