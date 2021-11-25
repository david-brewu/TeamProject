<?php

require_once('signupProcessing.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="/Users/kiitan/Documents/Current Computer/Ashesi/Junior/Web Technologies/Labs/Week10/css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>


<?php
//Checking to see if the register button has been clicked
if (isset($_POST['saveUser'])) {
    $frstnm   = $_POST['Fname'];
    $lstnm    = $_POST['Lname'];
    $home     = $_POST['housing'];
    $mailing  = $_POST['email'];
    $phonebook = $_POST['contact'];
    $password = $_POST['Pass1'];
    $check    = $_POST['Pass2'];




    $sql = "INSERT INTO customers(Firstname,Lastname,Home_address, Email, phone_number, password, confirmation) VALUES(?,?,?,?,?,?,?)";
    //take the db object defined in signupProcessing.php then prepare it for data supplied into the  sql variable 
    $insertion = $database->prepare($sql);
    $result = $insertion->execute([$frstnm, $lstnm, $home, $mailing, $phonebook, $password, $check]);
    if ($result) {
        echo 'Registration Successful';
    } else {
        echo 'Errors in your sign up';
    }
}




?>

<body>
    <!--Creating a form for a user's redistration-->


    <div>
        <form action="UserRegistration.php" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-m-3">
                        <h1>Register With Us!</h1>
                        <h4>You're one step closer to amazing delicacies</h4>
                        <hr class="mb-3">
                        <label for="user's firstname">Enter your First Name: </label>
                        <input class="control" type="text" name="Fname" required> <br><br>

                        <label for="user's Lastname">Enter your Last Name: </label>
                        <input class="control" type="text" name="Lname" required> <br><br>


                        <label for="user's Housing Address">Housing Address: </label>
                        <input class="control" type="text" name="housing" required><br><br>


                        <label for="user's Email">Enter your E-mail: </label>
                        <input class="control" type="email" name="email" required><br><br>


                        <label for="user's Contact">Enter your Phone Number: </label>
                        <input class="control" type="int" name="contact" required><br><br>



                        <label for="user's Password">Enter your Password: </label>
                        <input class="control" type="password" name="Pass1" required><br><br>



                        <label for="user's Password">Confirm Password: </label>
                        <input class="control" type="password" name="Pass2" required><br><br>

                        <hr class="mb-3">

                        <input class="btn btn-info" type="submit" name="saveUser" value="Register">
                    </div>
                </div>

            </div>
        </form>
    </div>

</body>

</html>