<!-- Done, but can we figure out Subtotal Calculation for checkout button? -->
<!-- subtotal: += value in Previous sibling of the parent * input change(+ or -) -->

<?php 
    session_start();
    // change these for each restaurant's page
    $_SESSION["rest_id"] = 2;
    $_SESSION["rest_name"] = "Big Ben";
    require("../database_credentials.php"); 
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Big Ben | RestaurantHub</title>
        <script src="../bootstrap-4.4.1.js"></script>
        <link href="../test.css" rel="stylesheet" type="text/css">
        <script src="../jquery-3.4.1.min.js"></script>
        <script src="../popper.min.js"></script>
        <!-- scripts for quantity input -->
        <script src="../spinner.js"></script>
        <!-- script for button icons -->
        <script src="https://kit.fontawesome.com/67bdff5a5f.js" crossorigin="anonymous"></script>

    </head>

    <body>

        <div class="jumbotron text-center">
            <h2><?php echo $_SESSION['rest_name'] ?></h2>
                <hr class="my-4">
        </div>

        <?php
            $conn = new mysqli(servername, username, password, database);
            $_SESSION['menu_query'] = "SELECT * FROM menu WHERE rest_id = ".$_SESSION["rest_id"]." ORDER BY menu_id ASC";
            $store_menu = $conn->query($_SESSION['menu_query']);
            
        ?>
        <form action="../cart.php" method = "POST"> 
            <!-- display menu with item price and quantity input -->
            <?php       
                for($menu_count = 0; $menu_count < $store_menu->num_rows; $menu_count++) {
                    
                    $item_id = $store_menu->fetch_row()[0];
                    
                    $store_menu->data_seek($menu_count);
                    
                    $item_name = $store_menu->fetch_row()[1];
                    $store_menu->data_seek($menu_count);
                    $item_price = $store_menu->fetch_row()[2];
                    
            ?>
                    <div class="row no-gutters">
                        <div class="col-md-6 col-sm-4">
                            <div class="card-header"> <?php echo $item_name ?> </div>     
                        </div>
                        <div class="text-right col-sm-2"> 
                            <?php echo $item_price ?>
                        </div>
                        <div class="col-sm-3 text-center quantity">
                            <input name = "item_quants[]" type="number" min="0" max="10" step="1" value="0">
                        </div>
                    </div>
                    
            <?php
                }       
            ?>


            
            <input class="btn btn-primary" style="position: fixed; bottom:20px; right:20px;" type="submit" name="goToCart" value="Proceed to Check Out">
            </form>
        
    </body>
</html>