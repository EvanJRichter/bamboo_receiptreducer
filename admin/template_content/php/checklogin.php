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
        echo "Worked";
    }
    // username and password sent from form
    $myusername=$_POST['myusername'];
    $mypassword=$_POST['mypassword'];

    echo $myusername;
    echo $mypassword;

    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);

    /*$myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);*/

    $find_user="SELECT * FROM user WHERE username ='$myusername' and password ='$mypassword'";
    $result=mysqli_query($conn, $find_user);

    if($result === FALSE) {
        die(mysqli_error()); // TODO: better error handling
    }

    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1){
        // Register $myusername, $mypassword and redirect to file "login_success.php"
        session_register("myusername");
        session_register("mypassword");
        header("location:index.php");
    }
    else {
        echo "Wrong Username or Password";
    }

}
?>
