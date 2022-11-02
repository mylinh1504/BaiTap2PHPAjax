$(document).ready(function () {
  //delete data
  $(document).on("click", ".delete-post", function (e) {
    e.preventDefault();
    if (confirm("Are you sure you delete?")) {
      var id = $(this).val();
      $.ajax({
        type: "POST",
        url: "../posts/delete.php",
        data: { id: id },
        dataType: "json",
        success: function (data) {
          $("#loadData").load(location.href + " #loadData");
        },
      });
    }
  });

  //edit
  $(document).on("click", ".edit-post", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "../posts/edit.php",
      data: { id: id },
      // dataType: "json",
      success: function (data) {
        $(".modal-body").html(data);
        $("#myModal").modal("show");
      },
    });
  });

  //upload
  $(document).on("submit", "#edit-form", function (ev) {
    ev.preventDefault();
    var uploadForm = {
      title: $("#title").val(),
      date: $("#date").val(),
      content: $("#content").val(),
      status: $("input[type='radio']:checked").val(),
      submit: $(".save-upload").val(),
      postId: $("#postId").val(),
    };
    // console.log(uploadForm);
    $.ajax({
      url: "../posts/edit.php",
      type: "POST",
      data: uploadForm,
      // dataType: "json",
      encode: true,
      success: function (data) {
        if (data) {
          $("#myModal").modal("hide");
          toastr.success(" Form upload success");
          toastr.options = { timeOut: "1000" };
          $("#loadData").load(location.href + " #loadData");
        } else {
          toastr["error"]("Form upload fail");
        }
      },
    });
  });
});
