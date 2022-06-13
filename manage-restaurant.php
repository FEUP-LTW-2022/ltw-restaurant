<?php
session_start();

include_once('database/connection.php');
include_once('database/account.class.php');
require_once('templates/elements.tpl.php');

drawHeader();
?>

<div class="manage-restaurant">
    <form method="post" action="manage-restaurant.php">
        <h1>Edit restaurant</h1>
        <label for="name">
            <b>Name</b>
            <input name="name" type="text" placeholder="Restaurant name .."  required>
        </label>

        <label for="category"><b>Category</b>
            <select name="category">
                <option value="steakhouse">Steakhouse</option>
                <option value="fastfood">Fast Food</option>
                <option value="italian">Italian</option>
                <option value="pizzeria">Pizzeria</option>
                <option value="mediterranean">Mediterranean</option>
            </select>
        </label>

        <label for="address">
            <b>Address</b>
            <input name="address" type="text" placeholder="Restaurant address .."  required>
        </label>

        <label for="openHours"><b>Open hours</b>
            <input name="openHour" type="time" required>
            <input name="closeHour" type="time" required>
        </label>
        <br>

        <button type="submit">Update</button>
    </form>
</div>

<?php drawFooter(); ?>
