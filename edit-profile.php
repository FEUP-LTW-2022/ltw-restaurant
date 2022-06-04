<?php
session_start();
include_once('database/connection.php');
include_once('database/account.class.php');
require_once('templates/elements.tpl.php');

if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    account::updateUserInfo($_POST);
}
drawHeader();
?>
<div class="edit-profile">
    <form method="post" action="edit-profile.php">
        <h1>Edit profile</h1>
    <label for="name">
        <b>Name</b>
        <input name="name" type="text" placeholder="Your name .." required>
    </label>

    <label for="phoneNumber"><b>Phone Number</b>
        <input name="phoneNumber" type="number" max="999999999" min="900000000" placeholder="Your phone number ..">
    </label>

    <label for="address">
        <b>Address</b>
        <input name="address" type="text" placeholder="Your address .." required>
    </label>

    <button type="submit">Update</button>
    </form>
</div>


<?php drawFooter(); ?>


