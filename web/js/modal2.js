$(function(){
  //get the click of the create button
  $('.modalButtonDiscussion').click(function(){
      $('#modalDiscussionCreate').modal('show')
         .find('#modalDiscussion')
          .load($(this).attr('value'));
  });
});
