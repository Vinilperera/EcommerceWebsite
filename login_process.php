<?php
session_start();
include("db.php");
$pagename="Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file 
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // retrieve form data

  $email = $_POST['email'];
  $password = $_POST['password'];
 


    // Chech if the entered email already in use.
    $sql_check= "SELECT * FROM Users WHERE userEmail='$email' && userPassword='$password";
    $result_check = mysqli_query($conn, $sql_check_email);
    if (mysqli_num_rows($result_check_email)== true) {
      echo "Account Found";
      exit(); 
    }
  

    // Close the database connection
    mysqli_close($conn);}


include("footfile.html"); //include head layout
echo "</body>";
?>