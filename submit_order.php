<?php 
    session_start();
    require("database_credentials.php"); 

$conn = new mysqli(servername, username, password, database);
$next_menu = $conn->query($_SESSION['menu_query']);
    
$next_menu->data_seek(0);  
foreach($_SESSION['post_data'] as $quant) {

    $item_info = $next_menu->fetch_row();
    
    $item_id = $item_info[0];     
    $item_name = $item_info[1];
    $item_price = $item_info[2];
    $item_rest = $item_info[3];
    if ($quant !=0) {
    $submit_sql = "INSERT INTO orders(rest_id, menu_id, quantity) values($item_rest, $item_id, $quant)";
    $insert_order = $conn->query($submit_sql) ;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Checkout Success | Restaurant </title>
        <link href="test.css" rel="stylesheet" type="text/css">
        <script src="jquery-3.4.1.min.js"></script>
        <script src="popper.min.js"></script>
        <script src="bootstrap-4.4.1.js"></script>
    </head>
    <body style = "margin-left: 10px">
        <p> Success! Your order has been submitted. The restaurant will contact you about your order soon. </p>

    </body>