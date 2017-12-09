<?php
require_once 'database/connect.php';

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

  ?>
