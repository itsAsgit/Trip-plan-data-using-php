<?php
$insert = false;
if(isset($_POST['name']))
{
// set connection variables
    $server ="localhost";
    $username = "root";
    $password = "";

// create connection
    $con = mysqli_connect($server, $username, $password);
// check for connection success
    if(!$con){
        die("connection to this database failed due to" .
        mysqli_connect_error());

    }
    //  echo "sucess connection to db";
       // select post vaiables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone']; 
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

//  echo $sql; 
     // execute the query
 if($con->query($sql) == true) {
    // echo "sucessfully inserted"; 
      // flag for sucessful insertion
    $insert = true;
 }
 else{

    echo"ERROR: $sql <br> $con->error";

 }
 // close the database connection

 $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <img class="bg" src="./images/hsa.jpg" alt="Scenery image">
    <div class="container">
        <h1>Welcome to Panjab University Trip Form</h1>
        <p>Enter your details and submit this form to confirm your
            participation in trip</p>
        <?php
        if($insert == true) {
            
        echo "<p class='submitmsg'>Thanks for Submitting your form </p>"; 
    }
        ?>

        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter Your Name">

            <input type="text" name="age" id="age" placeholder="Enter Your Age">

            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">

            <input type="email" name="email" id="email" placeholder="Enter your Email">

            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">

            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here "></textarea>
           
                <button class="btn">Submit</button>


        </form>
    </div>
    
   
</body>

</html>

 