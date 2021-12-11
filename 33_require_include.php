<?php

 //include 'connection.php';
 require 'connection.php';


 $sql = "SELECT * FROM `notes`";
 $result = mysqli_query($conn,$sql);

 //Find the number records returned
 $num = mysqli_num_rows($result);
 echo $num;
 echo " Records found in the Database <br>";
 while($row = mysqli_fetch_assoc($result)){
      //echo var_dump($row);
      echo $row['sno'] . ". Hello ".$row['sno'] ."Welcome to ".$row['title'];
      echo "<br>";
    }  
?>