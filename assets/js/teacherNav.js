$(function(){
  $('#v-pills-new-tab').click(function(){
    $('#v-pills-new').load('teacher/_newPage.php', function(){
      alert('clic!');
    });
  });
});
