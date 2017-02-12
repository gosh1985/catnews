
$(function(){
  //get the click of the create button
  $('#modalButtonComment').click(function(){
      $('#modalCommentCreate').modal('show')
         .find('#modalComment')
          .load($(this).attr('value'));
  });
});
