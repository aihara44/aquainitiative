<?php 
//insert.php
$connect = mysqli_connect("localhost", "root", "", "persada");
if(isset($_POST["framework"]))
{
 $framework = '';
 foreach($_POST["framework"] as $row)
 {
  $framework .= $row . ', ';
 }
 $framework = substr($framework, 0, -2);
 $query = "INSERT INTO framework(framework) VALUES('".$framework."')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
