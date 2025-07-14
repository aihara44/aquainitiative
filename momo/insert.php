<?php  
 $connect = mysqli_connect("localhost", "root", "", "momo");  
 $sql = "INSERT INTO name(first_name, last_name) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 