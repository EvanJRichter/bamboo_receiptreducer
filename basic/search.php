<?php
  if(isset($_POST['submit'])){
    if(isset($_GET['go'])){
      if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){
      $name=$_POST['name'];
      
      //connect  to the database
      $servername = "engr-cpanel-mysql.engr.illinois.edu";
      $username = "receiptr_user";
      $password = "bamboo1234";
      $dbname = "receiptr_backend";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 

      //-query  the database table
      $sql="SELECT  ProductID, name, brand FROM product2 WHERE name LIKE '%" . $name .  "%' ";
      //-run  the query against the mysql query function
      $result = mysqli_query($conn,$sql);

      //-create  while loop and loop through result set
      while($row=mysqli_fetch_array($result)){
        $ProductID  =$row['ProductID'];
        $name=$row['name'];
        $brand=$row['brand'];

        //-display the result of the array
        echo "<ul>\n";
        echo "<li>" . "<a  href=\"search.php?id=$ProductID\">"   .$name . " " . $brand .  "</a></li>\n";
        echo "</ul>";
        }
      }
      else{
        echo  "<p>Please enter a search query</p>";
      }
    }
  }
?>