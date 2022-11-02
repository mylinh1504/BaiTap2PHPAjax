$(document).ready(function () {
  $("#form-post").submit(function (e) {
    console.log("ok");
    var formPost = {
      title: $("#title").val(),
      date: $("#date").val(),
      content: $("#content").val(),
      status: $("input[type='radio']:checked").val(),
    };
    $.ajax({
      type: "POST",
      url: "err.php",
      data: formPost,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);

      if (!data.success) {
        if (data.errors.title) {
          $("#err-title").addClass("has-error");
          $("#err-title").html(data.errors.title);
        }
        if (data.errors.date) {
          $("#err-date").addClass("has-error");
          $("#err-date").html(data.errors.date);
        }
        if (data.errors.content) {
          $("#err-content").addClass("has-error");
          $("#err-content").html(data.errors.content);
        }
      } else {
        function complete() {
          $("#form-post").html(
            '<div class="alert alert-success">' + data.message + "</div>"
          );
        }
        setTimeout(complete(), 5000);
        window.location.replace("./posts/index.php");
      }
    });

    e.preventDefault();
  });
});
