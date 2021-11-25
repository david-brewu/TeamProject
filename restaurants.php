<!-- DONE (WITH NOTE ABOUT POSSIBLE STORE PAGE CHANGE) -->

<?php 
    session_start();
    require("database_credentials.php"); 
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Restaurants | RestaurantHub</title>
        <script src="jquery-3.4.1.min.js"></script>
        <script src="bootstrap-4.4.1.js"></script>
        <link href="test.css" rel="stylesheet" type="text/css">
        <script src="popper.min.js"></script>

    </head>


    <body>

        <!-- Script to click checkbox when tag button is clicked -->
        <script type="text/JavaScript">
            function updateTags(element) { 
                element.nextElementSibling.click();
            }
        </script>

        <!-- results: right of page -->
        <div class = "container text-center" id = "results">
            <!-- build restaurant list query -->
            <?php 
                //base query = return all restaurants
                $resultsquery = "SELECT * FROM RESTAURANTS";

                //filter based on tags
                if(isset($_GET['tags'])){
                    $tags_chosen = implode(", ", $_GET['tags']);
                    $tags_chosen_query = " JOIN restaurant_tags on (restaurants.id = restaurant_tags.rest_id) 
                    WHERE restaurant_tags.tag_id IN ($tags_chosen)";
                    $resultsquery .=$tags_chosen_query;
                }
                
                //filter based on price range
                if(isset($_GET['price'])) {
                    if (sizeof($_GET['price']) != 3) {
                        $prices_chosen = implode(", ", $_GET['price']);
                        //change query based on whether tags were also specified
                        if(isset($_GET['tags'])) {
                            $price_query = " AND restaurants.price_range in ($prices_chosen)";
                        }
                        else {
                            $price_query = " WHERE restaurants.price_range in ($prices_chosen)";
                        }
                        $resultsquery.=$price_query;
                    }
                }
                //remove duplicate results
                $resultsquery.=" group by restaurants.id";

                //database connection
                $conn = new mysqli(servername, username, password, database);

                // execute query to get restaurant list
                $results = $conn->query($resultsquery);

                //for each in list, make card
                for($count = 0; $count < $results->num_rows; $count++) {
                    
                    $restaurant_id = $results->fetch_row()[0];
                    $results->data_seek($count);
                    $restaurant_name = $results->fetch_row()[1]; 
                    $results->data_seek($count);
                    $restaurant_picture = $results->fetch_row()[5];
                    $results->data_seek($count);
                    $restaurant_price = $results->fetch_row()[4];

            ?>
                    <!-- CARD LINK: CHANGE IF STORE PAGES CHANGE -->
                    <a href = "store/rest<?php echo $restaurant_id ?>.php">
                    <div class="card col-md-4 d-md-inline-block"> 
                        <img class="card-img-top" src=<?php echo $restaurant_picture ?> alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $restaurant_name?></h5>
                            <p class="card-text"> 

                                <!-- PHP to get, make tags for each card-->
                                <?php
                                    $restaurant_tags_query = "SELECT tags.tag_name FROM tags JOIN restaurant_tags 
                                    on (restaurant_tags.tag_id = tags.tag_id) WHERE restaurant_tags.rest_id = $restaurant_id"; 
                                    $results_tags = $conn->query($restaurant_tags_query);
                                    for($tag_count = 0; $tag_count < $results_tags->num_rows; $tag_count++) {
                                        // for($some = 0; $some<5; $some++) {
                                        // $results_tags->data_seek($tag_count);
                                        $tag_name = $results_tags->fetch_row()[0]; 
                                    ?>
                                        <span class="badge badge-primary"><?php echo $tag_name ?></span> 
                                        
                                    
                                    <?php 
                                    }
                                ?>
                                <!-- PHP to show price range icon -->
                                <?php 
                                if($restaurant_price == 1) {
                                ?>
                                    <img class = "price-badge" src="images/price-low.png">
                                <?php
                                }
                                elseif($restaurant_price == 2) {
                                ?>
                                    <img class = "price-badge" src="images/price-medium.png">
                                <?php 
                                }
                                else {
                                ?>
                                    <img class = "price-badge" src="images/price-high.png">
                                <?php
                                }
                                ?>
                                
                            
                            </p>    
            
                        </div>
                    </div> 
                    </a>
            <?php
                }
            ?>

        </div>

        <!-- Sidebar: Filter by tags and/or price -->
        <div class="d-flex align-items-center" id="sidebar">
            <div class = "container text-center">
                <h4> Filter by: </h4>
                <hr>
                <form class = "form-group" method = "GET"> 
                
                <!-- Tag dropdown -->
                <a href="#tagFilter" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tags</a>
                    <div class="collapse list-unstyled" id="tagFilter">

                        <!-- Sidebar tag creation: clicking buttons triggers hidden checkbox inputs -->

                        <!-- Local -->
                        <button onclick = "updateTags(this)" type="button" id="LocalButton" class="btn btn-sm btn-outline-info" 
                                data-toggle="button" aria-pressed="false"> Local </button>
                        <input style="opacity: 0; position: absolute; top: -100px; left: -100px;" 
                                type = "checkbox" name = "tags[]" value = 1 id=LocalCheck> 

                        <!-- Chinese -->
                        <button onclick = "updateTags(this)" type="button" id="ChineseButton" class="btn btn-sm btn-outline-info" 
                                data-toggle="button" aria-pressed="false"> Chinese </button>
                        <input style="opacity: 0; position: absolute; top: -100px; left: -100px;" 
                                type = "checkbox" name = "tags[]" value = 2 id="ChineseCheck"> 
                                
                        <!-- French -->
                        <button onclick = "updateTags(this)" type="button" id="FrenchButton" class="btn btn-sm btn-outline-info" 
                                data-toggle="button" aria-pressed="false"> French </button>
                        <input style="opacity: 0; position: absolute; top: -100px; left: -100px;" 
                                type = "checkbox" name = "tags[]" value = 3 id="FrenchCheck"> 

                        <!-- Spanish -->
                        <button onclick = "updateTags(this)" type="button" id="SpanishButton" class="btn btn-sm btn-outline-info" 
                                data-toggle="button" aria-pressed="false"> Spanish</button>
                        <input style="opacity: 0; position: absolute; top: -100px; left: -100px;" 
                                type = "checkbox" name = "tags[]" value = 4 id="SpanishCheck"> 

                        <!-- Lebanese -->
                        <button onclick = "updateTags(this)" type="button" id="LebaneseButton" class="btn btn-sm btn-outline-info" 
                                data-toggle="button" aria-pressed="false"> Lebanese </button>
                        <input style="opacity: 0; position: absolute; top: -100px; left: -100px;" 
                                type = "checkbox" name = "tags[]" value = 5 id="LebaneseCheck"> 

                        <!-- Japanese -->
                        <button onclick = "updateTags(this)" type="button" id="JapaneseButton" class="btn btn-sm btn-outline-info" 
                                data-toggle="button" aria-pressed="false"> Japanese </button>
                        <input style="opacity: 0; position: absolute; top: -100px; left: -100px;" 
                                type = "checkbox" name = "tags[]" value = 6 id="JapaneseCheck"> 

                        <!-- German -->
                        <button onclick = "updateTags(this)" type="button" id="GermanButton" class="btn btn-sm btn-outline-info" 
                                data-toggle="button" aria-pressed="false"> German </button>
                        <input style="opacity: 0; position: absolute; top: -100px; left: -100px;" 
                                type = "checkbox" name = "tags[]" value = 7 id="GermanCheck"> 


                    </div>	
                <br> <br>


                <!-- Price filter dropdown -->
                <a href="#priceFilter" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Price Range</a>
                <div class="collapse list-unstyled" id="priceFilter">
                        
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name= "price[]" id="price1" value="1" checked>
                        <label class="form-check-label" for="price1">
                            <img class = "sidebar-icon" src="images/price-low.png">
                        </label>
                        <input class="form-check-input" name = "price[]" type="checkbox" id="price2" value="2" checked>
                        <label class="form-check-label" for="price1">
                            <img class = "sidebar-icon" src="images/price-medium.png">
                        </label>
                        <input class="form-check-input" name = "price[]" type="checkbox" id="price3" value="3" checked>
                        <label class="form-check-label" for="price1">
                            <img class = "sidebar-icon" src="images/price-high.png">
                        </label>
                    </div>
                </div> 
                <br>
                <input style="margin-top: 20px" class="btn btn-primary" type="submit" value="Filter">
                </form>
            </div>
        </div>

    </body>
</html>
