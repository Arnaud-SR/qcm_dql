$(function() {
  toggleBlock($('#block_new_answers'),$('[name=btn_new_answers]'));
  toggleBlock($('#block_questions_list'),$('[name=btn_add_questions]'));
  toggleBlock($('#block_newQuestion'),$('#btn_new_question'));
  toggleBlock($('#block_buildNewQCM'),$('#btn_buildQCM'));
  displayOtherThemeBlock();
  addOtherTheme();
  setQuestionTitle($('#A'));
  setQuestionTitle($('#B'));
  setQuestionTitle($('#C'));
  setQuestionTitle($('#D'));

});

function toggleBlock(blockID, listenerSel) {
    listenerSel.on('click', function(){
        blockID.find(this);
        blockID.toggleClass('d-none');
    })
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


//gérer le cas de la création d'un thème existant déjà