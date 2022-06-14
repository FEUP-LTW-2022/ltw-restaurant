<?php
    session_start();
    include_once(__DIR__ .'/../templates/elements.tpl.php');
    include_once(__DIR__ .'/../database/connection.php');
    include_once(__DIR__ .'/../database/restaurants.php');
    include_once(__DIR__ .'/../database/account.class.php');
    $db=getDatabaseConnection();
    $categories=getCategories($db);
    drawHeader();
    if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' && $_POST['token'] == $_SESSION['token']) {
        registerRestaurant($_POST,$_FILES);
    }
    if (!account::isLoggedIn()){
        ob_start();
        header('Location: login.php');
        die();
        }

?>
    <div class="register-restaurant">
        <form method="post" action="register-restaurant.php" enctype="multipart/form-data">

            <input name="token" value="<?php echo $_SESSION["token"] ?>" type="hidden">


            <h1>Register a restaurant</h1>

            <label for="RestaurantName"><b>Restaurant name</b>
                <input name="name" type="text" required>
            </label>

            <label><b>Category</b>
                <select name="category" required>
                    <?php foreach ($categories as $category){ ?>
                        <option value="<?=$category['id']?>"><?=$category['name']?></option>
                  <?php  } ?>
                </select>
            </label>

            <label><b>Address</b>
                <input name="address" type="text" required>
            </label>

            <span id="city_zip">
                <label><b>City</b>
                    <input name="city" type="text" required>
                </label>
                <label><b>ZIP Code</b>
                    <input name="zip" type="text" required>
                 </label>
            </span>

            <label><b>website</b>
                <input name="website" type="text">
            </label>

            <label for="openHours"><b>Open hours</b>
                <input name="openHour" type="time" required>
                <input name="closeHour" type="time" required>
            </label>
            <br>

            <label for="email"><b>Company Email</b>
                <input name="email" type="email" required>
            </label>

            <label for="CompanyNumber"><b>Phone Number</b>
                <input name="phoneNumber" type="number" max="999999999" min="900000000">
            </label>
            <label><b>Restaurant Logo</b>
                <input name="image" type="file" id="actual-btn" accept="image/*"><br>
            </label>

            <?php
                if (isset($_SESSION["error"])){
                    echo $_SESSION["error"];
                    unset($_SESSION["error"]);
                }
            ?>
            <button type="submit">Register</button>

        </form>
    </div>


<?php

    drawFooter();
?>



