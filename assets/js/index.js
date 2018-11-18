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

  displayOtherThemeBlock();
  addOtherTheme();
  setQuestionTitle($('#A'));
  setQuestionTitle($('#B'));
  setQuestionTitle($('#C'));
  setQuestionTitle($('#D'));
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


function displayOtherThemeBlock(){
  let other_option = $('option#other');
  let other_option_block = $('#other_option_block');

  other_option.on('click', function(){
    other_option_block.find(this);
    other_option_block.removeClass('d-none');
  })
}

function addOtherTheme(){

  let btn_ok = $('#button-addon2');
  let select_theme = $('[title=theme]');
  let input_theme = $('#new_theme');

  btn_ok.on('click', function(){
    alert('aie');
    select_theme.append(new Option(input_theme.val()));
  })
}

function setQuestionTitle(row) {
  let cell = row.find($('.col-sm-8'));
  let cb = row.find($('[type="checkbox"]'));

  row.on('dblclick', function(){
    cell.replaceWith('<th scope="row" class="col-sm-8"><input class="col-sm-11" type="text" value="bla"></th>');
    cb.prop("disabled",false);

  })
}
