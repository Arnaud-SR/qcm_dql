$(function(){
  $('#v-pills-new-tab').click(function(){
    $('#v-pills-new').load('teacher/_newPage.php');
  });
  $('#v-pills-home-tab').click(function(){
    $('#v-pills-home').load('teacher/_teacherMain.php');
  });
});
