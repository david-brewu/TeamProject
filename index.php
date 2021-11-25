<!-- Done except for login modal + user session info -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home | RestaurantHub </title>
        <link href="test.css" rel="stylesheet" type="text/css">
        <script src="jquery-3.4.1.min.js"></script>
        <script src="popper.min.js"></script>
        <script src="bootstrap-4.4.1.js"></script>
    </head>



    <body>
        <!-- header -->
        <div class="jumbotron text-center">
            <h1 class="display-4 align-content-center">You want it?</h1>
            <h1 class="display-4 align-content-center">We got it.</h1>
            <p class="lead">Getting food doesn't have to be stressful. 
            Search our offerings from local restaurants you love, 
            then sit back and relax as our team does the legwork for you.</p>
            <hr class="my-4">

            <!-- Button triggers signup modal -->
            <button type="button" id = "start" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Signup"> 
                Get Started 
            </button>
        </div>

        <!-- Signup Modal -->
        <div class="modal fade" id="Signup" tabindex="-1" role="dialog" aria-labelledby="SignupLabel" aria-hidden="true">
            <form class="form-inline" action="UserRegistration.php" method="POST">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="SignupLabel">Register With Us!</h3>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                        
                            <div class = "form-group">
                                <label>First Name:
                                    <input class="form-control" type="text" name="Fname" required> 
                                </label>
                            </div>

                            <div class = "form-group">
                            <label>Last Name: 
                                <input class="form-control" type="text" name="Lname" required>
                            </label>
                            </div>

                            <div class = "form-group">
                            <label>Address: 
                                <input class="form-control" type="text" name="housing" required>
                            </label>
                            </div>
                            
                            <div class = "form-group">
                            <label>E-mail: 
                                <input class="form-control" type="email" name="email" required>
                            </label>
                            </div>

                            <div class = "form-group">
                            <label>Phone Number: 
                                <input class="form-control" type="int" name="contact" required>
                            </label>
                            </div>

                            <div class = "form-group">
                            <label>Password: 
                                <input class="form-control" type="password" name="Pass1" required>
                            </label>
                            </div>

                            <div class = "form-group">
                            <label>Confirm Password: 
                                <input class="form-control" type="password" name="Pass2" required>
                            </label>
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-primary" type="submit" name="saveUser" value="Register">
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
            
        <h2 style = "margin-left: 10px; margin-bottom: 2%">Try our customers' favorite restaurants</h2>

        <div class = "text-center">
            <a href = "store/rest1.php">
                <div class="card col-md-4 d-md-inline-block"> <img class="card-img-top" src="images/santoku-sashimi.jpg" alt="Sashimi">
                    <div class="card-body text-center">
                        <h5 class="card-title">Santoku</h5>
                        <p class="card-text"> <span class="badge badge-primary"> Chinese</span> <span class="badge badge-primary"> Japanese</span></p>
                    </div>
                </div> 
            </a>
                
            <a href="store/rest2.php">
                <div class="card col-md-4 d-md-inline-block"> <img class="card-img-top" src="images/urban-grill-patatas.jpg" alt="Patatas">
                    <div class="card-body">
                        <h5 class="card-title text-center">Urban Grill</h5>
                        <p class="card-text"> <span class="badge badge-primary"> Spanish</span> <span class="badge badge-primary"> Local</span></p>
                    </div>
                </div> 
            </a>

            <a href = "store/rest3.php">
                <div class="card col-md-4 d-md-inline-block"> <img class="card-img-top" src="images/la-chaumiere-souffle.jpg" alt="Soufflé">
                    <div class="card-body">
                        <h5 class="card-title text-center">La Chaumiere</h5>
                        <p class="card-text"> <span class="badge badge-primary"> French</span><span class="badge badge-primary"> Spanish</span></p>
                    </div>
                </div> 
            </a>

            <br>

            <a class="btn btn-secondary btn-lg" href="restaurants.php" role="button">See All</a>
        </div>
    </body>
</html>

