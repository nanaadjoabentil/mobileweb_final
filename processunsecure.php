<?php
//connect to database
require_once('database/connect.php');

//check which button has been clicked.

if (isset($_POST['signin']))
{
  validateLogin();
}
else if (isset($_POST['signup']))
{
  validateRegister();
}
else if (isset($_POST['adminlogin']))
{
  validateAdminLogin();
}
else if (isset($_POST['postit']))
{
  fillIncidents();
}
// else if (isset($_POST['addpic']))
// {
//   fillIncidents();
// }

//function to validate registration
function validateRegister()
{
  if (empty($_POST['fullname']))
  {
    echo "Please enter your fullname";
  }
  else if (empty($_POST['age']))
  {
    echo "Please enter your age";
  }
  else if (empty($_POST['username']))
  {
    echo "Please enter your preferred username";
  }
  else if (empty($_POST['password']))
  {
    echo "Please enter your preferred password";
  }
  else if (empty($_POST['confirmpassword']))
  {
    echo "Please re-enter your password";
  }
  else if (empty($_POST['tel']))
  {
    echo "Please enter your telephone number";
  }
  else if (empty($_POST['email']))
  {
    echo "Please enter your email";
  }
  else
  {
    //if none of them are empty, check if username is already taken.
    checkUsername();
  }
}

//function to check if username is unique
function checkUsername()
{
  $username = $_POST['username'];

  $check = new Connect;

  $sql = "SELECT * FROM register WHERE username = '$username'";
  //echo $sql;

  $result = $check->query($sql);
  $get = $check->fetch();

  if ($get)
  {
     echo "Please choose another username. This one is already taken";
  }
  else
  {
    //if username is unique, go ahead and register user.
    checkPasswords();
  }
}

//function to check if password confirmation and first password match
function checkPasswords()
{
  //get password fields
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];

  if (strcasecmp($password,$confirmpassword) !== 0)
  {
    echo "Please check your passwords. They do not match";
  }
  else
  {
    registerUser();
  }
}

//function for registering students
function registerUser()
{
  //get form fields from webpage
  $fullname = $_POST['fullname'];
  $age = $_POST['age'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  $telephone = $_POST['tel'];
  $email = $_POST['email'];
  $org = $_POST['org'];

  // $passwordhash = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO register(fullname,age,username,password,confirmpassword,telephonenumber,email,organization) VALUES ('$fullname','$age','$username','$password','$confirmpassword','$telephone','$email','$org')";

// echo $sql;
  //new instance of database class
  $register = new Connect;

  //execute query
  $run = $register->query($sql);
// var_dump($run);

  if($run)
  {
    //if query works, redirect to login page
    header("location: signin.html");
  }
  else
  {
    echo "Error occurred during registration";
  }
}

//function to validate login
function validateLogin()
{
  if (empty($_POST['username']))
  {
    echo "Please enter a username";
  }
  else if (empty($_POST['password']))
  {
    echo "Please enter a password";
  }
  else
  {
    //if none of them are empty, log the user in
    userLogin();
  }
}

//function for Login
function userLogin()
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM register WHERE username = '$username' && password = '$password'";

    //create new instance of database connection class

    $login = new Connect;

    //execute query
    $run = $login->query($sql);
    $results = $login->fetch();

    if ($results)
    {
      //get username from results
      $name = $results['username'];

      //get user's full name from database based on that username
      $sql2 = "SELECT fullname FROM register WHERE username = '$name'";

      $runquery = $login->query($sql2);
      $answers = $login->fetch();

      //assign result of query (user's full name) to a variable
      $username = $answers['fullname'];

      //store user's name in a session so i can get it later.
      session_start();
      $_SESSION['username'] = $username;

      //if all is successful, redirect to landing page.
      header("location: landingpage.html");
    }
    else {
      echo "Incorrect Login Details. Try Again.";
    }
  }


  //function to validate login
  function validateAdminLogin()
  {
    if (empty($_POST['username']))
    {
      echo "Please enter a username";
    }
    else if (empty($_POST['password']))
    {
      echo "Please enter a password";
    }
    else
    {
      //if none of them are empty, log the user in
      adminLogin();
    }
  }

  //function for Login
  function adminLogin()
  {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM admin WHERE username = '$username' && password = '$password'";

      //create new instance of database connection class

      $login = new Connect;

      //execute query
      $run = $login->query($sql);
      $results = $login->fetch();

      if ($results)
      {
        //if all is successful, redirect to landing page.
        header("location: admindashboard.html");
      }
      else {
        echo "Incorrect Login Details. Try Again.";
      }
    }



  function fillIncidents()
  {
    require_once "upload.php";
    //get info from incident form
    //try and get the username from the session.
    session_start();

    $id = "";
    $type = $_POST['type'];
    $other = $_POST['other'];
    $details = $_POST['textarea'];

    //write sql
    if($type == "other")
    {
    $sql = "INSERT INTO incidents(type,details) VALUES ($other','$details')";

    $db = new Connect;

    $run = $db->query($sql);

    if($run)
    {
      echo "Incident successfully reported";
    }
    else {
      echo "Failed to post incident. Try again later";
    }
  }
  else if ($type !== "other")
  {
    $sql = "INSERT INTO incidents(reporter,type,details) VALUES ('$reporter','$type','$details')";

    $db = new Connect;

    $run = $db->query($sql);

    if($run)
    {
      echo "Incident successfully reported";
    }
    else {
      echo "Failed to post incident. Try again later";
    }
  }
  }
 ?>
