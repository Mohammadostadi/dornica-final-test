function usernamejs(input) {
  input.value = input.value.replace(/[^a-zA-Z0-9@_-]/g, "");
}
function numberjs(input) {
  input.value = input.value.replace(/[^0-9]/g, "");
}
function namejs(input) {
  input.value = input.value.replace(/[^ا-ی]/g, "");
}

const refreshButton = document.querySelector(".refresh-captcha");
refreshButton.onclick = function () {
  document.querySelector(".captcha-image").src = "captcha.php?" + Date.now();
};

function validateNationalCode(code) {
  if (!/^\d{10}$/.test(code)) {
    return false;
  }
  var check = parseInt(code[9]);
  console.log(check);
  var sum = 0;
  for (var i = 0; i < 9; i++) {
    sum += parseInt(code[i]) * (10 - i);
  }
  sum = sum % 11;
  return (sum < 2 && check == sum) || (sum >= 2 && check + sum == 11);
}

$("#ncode").on("input", function () {
  var code = $(this).val();
  if (validateNationalCode(code)) {
    $("#result").text("کد ملی معتبر است");
  } else {
    $("#result").text("کد ملی نامعتبر است");
  }
  if (code == "") {
    $("#result").text("");
  }
});
