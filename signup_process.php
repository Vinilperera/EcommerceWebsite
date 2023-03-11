<?php
session_start();
include("db.php");
$pagename="Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file 
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // retrieve form data
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $postcode = $_POST['postcode'];
  $phoneno = $_POST['phoneno'];
  $password = $_POST['password'];
  $confirm_password = $_POST['conpassword'];

     // Check if any fields in the form were left empty
  if (empty($firstname) || empty($lastname) || empty($address) || empty($postcode) || empty($phoneno) || empty($email) || empty($password) || empty($confirm_password)) {
    echo "Please fill out all fields";
    exit();
  }

  // Check if the 2 entered passwords match
 // if ($password != $confirm_password) {
//    echo "Passwords do not match";
  //  exit();
  //}

  // Define a regular expression to validate email address format
  $email_regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

  // Chech if the entered email already in use.
  $sql_check_email = "SELECT * FROM Users WHERE userEmail='$email'";
  $result_check_email = mysqli_query($conn, $sql_check_email);

  if (mysqli_num_rows($result_check_email) > 1) {
    echo "Email address is already in use";
    exit(); 
  }

  // insert data into database table
     // Write a SQL query to insert a new user into the users table
    $SQL = "INSERT INTO user (userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword)
            VALUES ('$firstname', '$lastname', '$address', '$postcode', '$phoneno', '$email', '$password')";
  
    // Execute the INSERT INTO SQL query
    if (mysqli_query($conn, $SQL)) {
      echo "New user created successfully";
    } else {
        $sql_error_code = mysqli_errno($conn);
        if ($sql_error_code == 1064) {
          echo "Invalid characters in input fields";
        } else {
          echo "Error: " . mysqli_error($conn);
        }
    }
  
    // Close the database connection
    mysqli_close($conn);}


include("footfile.html"); //include head layout
echo "</body>";
?>