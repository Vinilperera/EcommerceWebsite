<?php
session_start();
$pagename="Log in"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

include("db.php");
echo "<form action=login_process.php method=post>";
echo "<table style='border: 0px'>";



echo "<tr><td style='border: 0px'><label class=Email>Email</label></td>";
echo "<td style='border: 0px'><input type=Email id=Email name=Email size = 30 placeholder='Enter your valid Email' Required></td>";
echo "</tr>";
echo "<tr><td style='border: 0px'><label class=pass1>Password</label></td>";
echo "<td style='border: 0px'><input type=password id=pass1 name=pass1 size = 30 placeholder='Enter a password' Required></td>";
echo "</tr>";

echo "<tr><input type=hidden name=cru_req value=Log in>";
echo "<td style='border: 0px'><button class=but type=submit>Log in</button></td>";
echo "<td style='border: 0px'><button class=Clear onclick=clearForm()>Clear</button></td></tr>";
echo "</table>";
echo "</forme>";





include("footfile.html"); //include head layout
echo "</body>";
?>