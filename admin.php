<?php

ob_start();
$host="mysql"; // Host name 
$username="admin"; // Mysql username 
$password="Yahoo@2016"; // Mysql password 
$db_name="members_smb"; // Database name 
$tbl_name="users"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$username=$_POST['username']; 
$password=$_POST['password']; 

//sql query
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("username");
session_register("password"); 
header("location:index.html");
}
else {
echo "Wrong Username or Password";
}
ob_end_flush();
?>
