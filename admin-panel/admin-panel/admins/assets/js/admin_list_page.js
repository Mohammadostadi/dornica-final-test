$(".btn-close").click(function () {
  window.location = "admins_list.php";
});
$(".edit").click(function () {
  const id = $(this).val();
  $(`#exampleModal${id}`).modal("show");
});
$(".close").click(function () {
  const id = $(this).val();
  $(`#exampleModal${id}`).modal("hide");
});

