<?php

error_reporting(E_ALL ^ E_DEPRECATED);
$username = "localhost";
$password = "root";
$hostname = ""; 
$dbname="";


//connection to the database
$conn = mysql_connect("localhost", "root", "")
 or die("Unable to connect to MySQL");
 
//select a database to work with
$selected = mysql_select_db("family",$conn)
  or die("Could not select examples" . mysql_error());
?>