<?php
    session_start();
    include_once ("templates/elements.tpl.php");

    drawHeader();
    if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
        registerRestaurant($_POST);
    }
?>
    <div class="register">
        <form method="post" action="register-restaurant.php">
            <h1>Register a restaurant</h1>

            <label for="RestaurantName"><b>Restaurant name</b>
                <input name="RestaurantName" type="text" required>
            </label>

            <label><b>City</b>
                <input name="city" type="text" required>
            </label>

            <label><b>Address</b>
                <input name="address" type="text" required>
            </label>

            <label><b>ZIP Code</b>
                <input name="postal code" type="text" required>
            </label>


            <label><b>Website</b>
                <input name="website" type="text">
            </label>

            <label for="openHours"><b>Open hours</b>
                <input name="open-time" type="time" required>
                to
                <input name="close-time" type="time" required>
            </label>
            <br>

            <label id="company-email" for="email"><b>Company Email</b>
                <input name="email" type="email" required>
            </label>

            <label for="CompanyNumber"><b>Phone Number</b>
                <input name="phoneNumber" type="number" max="999999999" min="900000000">
            </label>

            <label><b>Restaurant Logo</b>
                <input name="image" type="file" id="actual-btn" accept="image/*"><br>
            </label>

            <button type="submit">Register</button>

        </form>
    </div>


<?php

    drawFooter();
?>



