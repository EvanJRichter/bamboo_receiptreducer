<?php
if(isset($_POST['login'])){
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
      echo "Can't connect";
    }
    else{
        echo "Connection to database established. \n";
    }
    // username and password sent from form
    $myusername=$_POST['myusername'];
    $mypassword=$_POST['mypassword'];

    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);

    /*$myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);*/

    $find_user="SELECT * FROM user WHERE username ='$myusername' and password ='$mypassword' ";
    $result=mysqli_query($conn, $find_user);

    //if($result === FALSE) { 
    //    die(mysqli_error()); // TODO: better error handling
    //}   

    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1){
        // Register $myusername, $mypassword and redirect to file "login_success.php"
        //session_register("myusername");
        //session_register("mypassword");
        //header("location:index.php");
        
        //echo "Logged in!";
        //-create  while loop and loop through result set
        $find_receipts="SELECT * FROM receipts WHERE userID IN (
            SELECT userID FROM user WHERE username = '".$myusername."'
        )";

        $result=mysqli_query($conn, $find_receipts);
        while($row=mysqli_fetch_array($result)){
            $receiptID  =$row['receiptID'];
            $timeDate=$row['timeDate'];
            $preTax=$row['preTax'];
            $postTax=$row['postTax'];
            $userID=$row['userID'];


            //-display the result of the array
            echo "<p>\n";
            echo "<h2>"  .$receiptID . " " . $timeDate .  " " . $preTax .  " " . $postTax .  "</h2>\n";

            $find_products="SELECT * FROM product WHERE productID IN (
                SELECT productID FROM receiptContainsProduct WHERE userID = '".$userID."'
            )";
            $receipt_result=mysqli_query($conn, $find_products);

            while($receipt_row=mysqli_fetch_array($receipt_result)){
                $ProductID  =$receipt_row['ProductID'];
                $name=$receipt_row['name'];
                $brand=$receipt_row['brand'];

                //-display the result of the array
                echo "<h4>"  .$ProductID . " " . $name .  " " . $brand .  " </h4>\n";
            }
            

            echo "</p>";
        }
    }
    else {
        echo "Wrong Username or Password";
    }

}
?>
