$(document).ready(function () {
    toggleBlock($('#btn_noPublished_QCM_list'), $('#block_noPublished_QCM_list'));
    toggleBlock($('#btn_published_QCM_list'), $('#block_published_QCM_list'));

    //loadPageOnClick($('#btn_display_qcm_form'), $('#block_qcm_form'), '_qcm_form1.php');
    toggleBlock($('#btn_display_qcm_form'), $('#block_qcm_form'));

    loadPageOnClick($('#btn_display_question_form'), $('#block_question_form'), '_question_form1.php');
    toggleBlock($('#btn_display_question_form'), $('#block_question_form'));
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

$(function () {
    displayNewAnswers();
    displayNewQuestion();
    displayOtherThemeBlock();
    addOtherTheme();
});

function displayNewAnswers() {
    let answersBlock = $('#block_new_answers');
    let displayAnswersBtn = $('[name=btn_new_answers]');

    displayAnswersBtn.on('click', function () {
        answersBlock.find(displayAnswersBtn);
        answersBlock.removeClass('d-none');
    })
}

function displayNewQuestion() {
    let questionBlock = $('#block_newQuestion');
    let displayQuestionFormBtn = $('#btn_new_question');

    displayQuestionFormBtn.on('click', function () {
        questionBlock.find(displayQuestionFormBtn);
        questionBlock.removeClass('d-none');
    })
}

function displayOtherThemeBlock() {
    let other_option = $('option#other');
    let other_option_block = $('#other_option_block');
    let select = $('select[name="select_theme"]');

    select.on('change', function () {
        if ($(this).val() == 'other') {
            other_option_block.find(other_option);
            other_option_block.removeClass('d-none');
        }
    });
}

function addOtherTheme() {
    let btn_ok = $('#button-addon2');
    let select_theme = $('[title=theme]');
    let input_theme = $('#new_theme');

    btn_ok.on('click', function () {
        select_theme.append(new Option(input_theme.val()));
    })
}
