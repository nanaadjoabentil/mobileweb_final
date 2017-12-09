<?php

//connect to database
require_once('database/connect.php');

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


?>
