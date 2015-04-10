<?php    
    if(isset($_POST['add_product'])){
        
        if(isset($_GET['go'])){
            
            if( (preg_match("/^[  a-zA-Z]+/", $_POST['add_product_name'])) &&        
                (preg_match("/^[  a-zA-Z]+/", $_POST['add_product_brand']))  ) 
            {
                $name=$_POST['add_product_name'];
                $brand=$_POST['add_product_brand'];
                
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

                //ADD STUFF
                $sql = "INSERT INTO product2 (name, brand)
                VALUES ('$name', '$brand')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } 
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }

            else {
                echo  "<p>Please enter a valid tuple</p>";
            }

        }

    }

?>