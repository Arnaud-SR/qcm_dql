$(document).ready(function () {
  displayOtherThemeBlock();
  addOtherTheme();
  setQuestionTitle($('#A'));
  setQuestionTitle($('#B'));
  setQuestionTitle($('#C'));
  setQuestionTitle($('#D'));
});

function displayOtherThemeBlock(){
  let other_option_block = $('#other_option_block');
    let select_thematics = $("[name='select_theme']");

    select_thematics.on('change', function (e) {
        if (this.value === 'other') {
            other_option_block.removeClass('d-none');
        }
    });

}

function addOtherTheme(){

  let btn_ok = $('#button-addon2');
  let select_theme = $('[title=theme]');
  let input_theme = $('#new_theme');

    btn_ok.on('click', function(){
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
