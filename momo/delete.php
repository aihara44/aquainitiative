<?php  
 $connect = mysqli_connect("localhost", "root", "", "momo");  
 $sql = "DELETE FROM name WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>