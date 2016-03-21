$(document).on("click", ".comment-link", function () {
  var requestId = $(this).data('id');
  $("#request-id-input").val( requestId );
  // debugger;

  // var requestComment = $(this).data('comment');
  // $("#request-comment-textarea").val(requestComment);
  
  // As pointed out in comments, 
  // it is superfluous to have to manually call the modal.
  // $('#addBookDialog').modal('show');
});