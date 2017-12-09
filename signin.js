function signin()
{
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  var info = 'username='+username + '&password='+password;

  if (username == "" || password = "")
  {
    alert("Please fill all fields");
  }
  else {
    $.ajax({
      type: "POST",
      url: "signin.php",
      data{
        username: username,
        password: password
      },
      cache: false,
      success: function(html) {
        alert(html);
      }
    });
  }
  return false;
}
