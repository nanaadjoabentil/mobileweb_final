function signup()
{
  var fullname = document.getElementById('fullname').value;
  var age = document.getElementById('age').value;
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  var tel = document.getElementById('tel').value;
  var email = document.getElementById('email').value;
  var org = document.getElementById('org').value;

  var info = 'fullname='+fullname+ '$age='+age + '&username='+username + '&password='+password + '&tel='+tel + '&email='+email + '&org='+org;

  if (fullname == "" || age == "" || username == "" || password = "" || tel == "" || email == "" || org == "")
  {
    alert("Please fill all fields");
  }
  else {
    $.ajax({
      type: "POST",
      url: "signup.php",
      data{
        fullname: fullname,
        age: age,
        username: username,
        password: password,
        tel: tel,
        email: email,
        org: org  
      },
      cache: false,
      success: function(html) {
        alert(html);
      }
    });
  }
  return false;
}
