$(function() {
  loadPageOnClick($('#v-pills-new-tab'),$('#v-pills-new'),'teacher/pages/_new1.php');
  loadPageOnClick($('#v-pills-home-tab'),$('#v-pills-home'), 'teacher/pages/_home1.php');

  loadPageOnClick($('#btn_load_display_qcm_form'),$('#block_qcm_form'), 'teacher/forms/_qcm_form1.php');
  toggleBlock($('#btn_load_display_qcm_form'), $('#block_qcm_form'));

  loadPageOnClick($('#btn_load_display_question_form'),$('#block_question_form'), 'teacher/forms/_question_form1.php');
  toggleBlock($('#btn_load_display_question_form'), $('#block_question_form'));


  // loadPageOnClick(listenerSel,matchedElSel, pathname);
  toggleBlock($('#block_noPublished_QCM_list'), $('#btn_noPublished_QCM_list'));
  toggleBlock($('#block_published_QCM_list'), $('#btn_published_QCM_list'));

});

function removeBlock(displayBtnSel, matchedElSel) {
    displayBtnSel.on('click', function(){
        matchedElSel.find(this);
        matchedElSel.addClass('d-none');
    })
}

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
