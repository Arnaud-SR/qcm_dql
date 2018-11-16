$(function() {
  toggleNewAnswers();
  toggleNewQuestion();
  displayOtherThemeBlock();
  addOtherTheme();
  toggleNewQCM();
  toggleQuestionList();

  // setQuestion();



  // $('#question').find($("input")).focus(function () {
  //   console.log("focus");
  // });


});


function toggleNewAnswers() {
  let answersBlock = $('#block_new_answers');
  let displayAnswersBtn = $('[name=btn_new_answers]');

    displayAnswersBtn.on('click', function(){
        answersBlock.find(this);
        answersBlock.toggleClass('d-none');
    })
}

function toggleQuestionList() {
  let blockQuestionsList = $('#block_questions_list');
  let displayQuestionsBtn = $('[name=btn_add_questions]');

  displayQuestionsBtn.on('click', function(){
      blockQuestionsList.find(this);
      blockQuestionsList.toggleClass('d-none');
  })
}

function toggleNewQuestion() {
  let questionBlock = $('#block_newQuestion');
  let displayQuestionFormBtn = $('#btn_new_question');

  displayQuestionFormBtn.on('click', function(){
      questionBlock.find(this);
      questionBlock.toggleClass('d-none');
  })
}

function toggleNewQCM() {
  let qcmBlock = $('#block_buildNewQCM');
  let displayQCMForm = $('#btn_buildQCM');

  displayQCMForm.on('click', function(){
      qcmBlock.find(this);
      qcmBlock.toggleClass('d-none');
  })
}

function displayOtherThemeBlock(){
  let other_option = $('option#other');
  let other_option_block = $('#other_option_block');

  other_option.on('click', function(){
    other_option_block.find(other_option);
    other_option_block.removeClass('d-none');
  })
}

function addOtherTheme(){
  let btn_ok = $('#button-addon2');
  let select_theme = $('[title=theme]');
  let input_theme = $('#new_theme');

  btn_ok.on('click', function(){
    select_theme.append(new Option(input_theme.val()));
  })
}

// function setQuestion() {
//
//   let title = $('#question');
//
//   title.on('dblclick', function(){
//     this.replaceWith('<input id="new" type="text">');
//     $('#new').attr('name','question_' + block.attr("id") );
//
//   }
//
//   let row = $('#A');
//   let cb = row.find($('[type="checkbox"]'));
//
//   row.on('dblclick', function(){
//     cb.prop("disabled",false);
//     const block = row.find($('div'));
//     block.replaceWith('<input id="new" type="text">');
//     $('#new').attr('name','input_' + row.attr("id") );
//     const input = row.find($('[name^="input"]'));
//     input.removeAttr('id');
//     input.attr('value', block.text());
//   })
//
//   $('#questionModal').on('click', function(){
//     let newVal = $('[name^="input"]').val();
//     $('[name^="input"]').replaceWith('<div id="newDiv"></div>');
//     $('#newDiv').html(newVal);
//
//   })
//
//   row.on('click',function (event) {
//     event.stopPropagation();
//   })
//
//
// }

// function setQuestion() {
//   let title = $('#question_title');
//   let qblock = $('[class=form-group row]')
//
//   qblock.on('dblclick', function(){
//     title.replaceWith('<input id="new_question_title" type="text">');
//     title.prop("disabled",false);
//   })

//}


//gérer le cas de la création d'un thème existant déjà
