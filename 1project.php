<?php

$insert = false;

$server = "localhost";
$username = "root";
$password = "";
$database = "trip";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $description = $_POST['desc'];

    $sql = "INSERT INTO trip
            (name, age, gender, email, number, description)
            VALUES
            ('$name','$age','$gender','$email','$number','$description')";

    if (mysqli_query($con, $sql)) {
        $insert = true;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,900;1,900&display=swap" rel="stylesheet">
    <style>

        *{
            margin:0px;
            padding: 0px;
            box-sizing: border-box;
        }
        body{
            background-image:url("https://wallpapers.com/images/hd/blue-hd-1920-x-1080-background-w8mz65dqtn219ujr.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        
.container{
    max-width: 80%;
    
    opacity: 0.6;
    padding:34px;
    margin: auto;
    border-radius: 0px 0px 25px 25px;
}
.container h2,p{
    text-align: center;
    color: white;
    font-weight: 800;
}

h2{
    font-size: 32px;
    font-family: "Roboto", sans-serif;
  font-optical-sizing: auto;
  font-weight: 900;
  font-style: normal;
  font-variation-settings:
    "wdth" 100;
    
}
p{
    font-size: 19px;
    
}

input, textarea{
    width:80%;
    margin:11px ;
    font-size: 16px;
    padding: 7px;
    outline:none;
    border-radius: 8px;
    border:3.5px solid #dad7cd; 
    background-color: #e0f5f9;
    color: black;
}

form{
     display:flex;
    justify-content: center;
    align-items:center;
    flex-direction: column;
}
.btn{
    background-color: #c9e4f2;
    color: black;
    border-color:2px solid #03045e ;
    padding: 8px;
    border-radius: 12px;
    font-size: 15px;
    cursor: pointer;
}
.btn:hover{
    color:black;
    text-decoration: underline;
    background-color: #d5ebf0;
    
}
.tq{
    color:greenyellow;
    font-size: 16px;
}



    </style>
</head>

<body>

    <div class="container">
        <h2>Welcome to trip form</h2>
        <p>Enter your details to confirm your participation in the trip</p>
       <?php
if($insert){
    echo "<p class='success'>Thanks! Your form has been submitted successfully.</p>";
}
?>

        <form  method="post">

            <input type="text" name="name" id="name" placeholder="Enter Your name">

            <input type="number" name="age" id="age" placeholder="Enter Your age">

            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">

            <input type="email" name="email" id="email" placeholder="Enter Your email">

            
        <input type="text" id="number" name="number" placeholder="Enter Phone Number"  maxlength="10">

<textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other imformation"></textarea>


 <button class="btn">Submit</button>

        </form>
    </div>

    <script>

    </script>
</body>
</html>
