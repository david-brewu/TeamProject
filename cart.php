<?php 
    session_start();
    $_SESSION['post_data'] = $_POST['item_quants'];
    require("database_credentials.php"); 
?>

<script>
    function editOrder() {
        window.history.back();
    }
    function submitOrder() {
        window.location.href = "submit_order.php";
    }
</script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Review Cart | RestaurantHub </title>
        <link href="test.css" rel="stylesheet" type="text/css">
        <script src="jquery-3.4.1.min.js"></script>
        <script src="popper.min.js"></script>
        <script src="bootstrap-4.4.1.js"></script>
    </head>

    <body style = "margin-left: 10px">
        <h3> Your Order </h3>
        <p>
            <?php
                $conn = new mysqli(servername, username, password, database);
                $menu_query = "SELECT * FROM menu WHERE rest_id = ".$_SESSION['rest_id']." ORDER BY menu_id ASC";
                $next_menu = $conn->query($_SESSION['menu_query']);
                $next_menu->data_seek(0);          
                
                $submit_sql = "";
                foreach($_POST['item_quants'] as $quant) {
                    $item_info = $next_menu->fetch_row();
                    $item_id = $item_info[0];     
                    $item_name = $item_info[1];
                    $item_price = $item_info[2];
                    $submit_sql .= $item_name." ".$quant;     
                    echo(nl2br($item_name." - ".$quant."\n"));
                }
                //echo($submit_sql);
            ?>
        
        </p>
        <button class = "btn btn-primary" onclick = "editOrder()"> Back </button> <button class = "btn btn-primary" onclick="submitOrder()"> Confirm </button>
        
   


        
 