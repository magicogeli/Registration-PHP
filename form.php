<?php
    $errors = '';

    // getting all values from the HTML form
    if(isset($_POST['submit']))
    {
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $dob = htmlspecialchars($_POST['dob']);
        $age = htmlspecialchars($_POST['age']);
        $gender = htmlspecialchars($_POST['gender']);

        if((preg_match('/^[\.a-zA-Z,]*$/', $fname) == 0) || (preg_match('/^[\.a-zA-Z,]*$/', $lname) == 0))
        {
            $errors = $errors. " Invalid name provided. Please check first name and/or last name.</br>";
        } 

        if(preg_match('/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email) == 0)
        {
            $errors = $errors. " Invalid email format. Please check email provided.</br>";
        }

        if(preg_match('/^(09|\+639)\d{9}$/', $tel) == 0)
        {
            $errors = $errors. " Invalid phone number provided. Please check phone number format.</br>";
        }      
        
        if ($dob == '')
        {
            $errors = $errors. " Please fill up Date of Birth.</br>";
        }
        
        if ($gender == '')
        {
            $errors = $errors. " Please choose a gender.</br>";
        }
    }

    // database details
    if($errors == '')
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "propellr";

        // creating a connection
        $con = mysqli_connect($host, $username, $password, $dbname);

        // to ensure that the connection is made
        if (!$con)
        {
            die("Connection failed!" . mysqli_connect_error());
        }

        // using sql to create a data entry query
        $sql = "INSERT INTO users (FirstName, LastName, EmailAddress, MobileNumber, DoB, Age, Gender) VALUES ('$fname', '$lname', '$email', '$tel', '$dob', '$age', '$gender')";
    
        // send query to the database to add values and confirm if successful
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
            ?>
            <h2><?php echo "Entries added successfully!"; ?></h2>
            <a href="http://localhost:8080/Propellr/">Return to Registration Page</a>
            <?php
            
        }
    
        // close connection
        mysqli_close($con);
    }
    else{
        ?> <h3><?php echo $errors;?></h3>
        <?php?>
        <a href="http://localhost:8080/Propellr/">Return to Registration Page</a>
    <?php
    }

?>