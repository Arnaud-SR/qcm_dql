$(function() {
  toggleNewAnswers();
  toggleNewQuestion();
  displayOtherThemeBlock();
  addOtherTheme();
  toggleNewQCM();
  toggleQuestionList();
});

function toggleNewAnswers() {
  let answersBlock = $('#block_new_answers');
  let displayAnswersBtn = $('[name=btn_new_answers]');

    displayAnswersBtn.on('click', function(){
        answersBlock.find(displayAnswersBtn);
        answersBlock.toggleClass('d-none');
    })

}

function toggleQuestionList() {
  let blockQuestionsList = $('#block_questions_list');
  let displayQuestionsBtn = $('[name=btn_add_questions]');

  displayQuestionsBtn.on('click', function(){
      blockQuestionsList.find(displayQuestionsBtn);
      blockQuestionsList.toggleClass('d-none');
  })
}

function toggleNewQuestion() {
  let questionBlock = $('#block_newQuestion');
  let displayQuestionFormBtn = $('#btn_new_question');

  displayQuestionFormBtn.on('click', function(){
      questionBlock.find(displayQuestionFormBtn);
      questionBlock.toggleClass('d-none');
  })
}

function toggleNewQCM() {
  let qcmBlock = $('#block_buildNewQCM');
  let displayQCMForm = $('#btn_buildQCM');

  displayQCMForm.on('click', function(){
      qcmBlock.find(displayQCMForm);
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

//gérer le cas de la création d'un thème existant déjà
