<?php

function drawChangePassword(){ ?>
    <div class="change-password">
        <form method="post" action="../pages/change-password.php">
            <h1>Change password</h1>
            <input name="token" value="<?php echo $_SESSION["token"] ?>" type="hidden">
            <label for="oldPassword">
                <b>Old Password</b>
                <input name="oldPassword" type="password" placeholder="Type your old password .." minlength="8" required>
            </label>
            <?php
            if ($_SESSION["error"] == "invalid password"){
                echo "<p class='error'>invalid password</p>";
                unset($_SESSION["error"]);
            }
            ?>


            <label for="newPassword"><b>New Password</b>
                <input name="newPassword" type="password" placeholder="Type your new password .." minlength="8" required>
            </label>

            <label for="newPasswordConfirmation">
                <b>New Password Confirmation</b>
                <input name="newPasswordConfirmation" type="password" placeholder="Confirm your new password .." minlength="8" required>
            </label>
            <?php
            if ($_SESSION["error"] == "new password different from confirmation"){
                echo "<p class='error'>new password different from confirmation</p>";
                unset($_SESSION["error"]);
            }
            ?>

            <button type="submit">Change Password</button>
        </form>
    </div>
<?php }

function drawEditProfile(){ ?>

    <div class="edit-profile">
        <form method="post" action="../pages/edit-profile.php">
            <h1>Edit profile</h1>
            <label for="name">
                <b>Name</b>
                <input name="name" type="text" placeholder="Your name .." value="<?php echo account::getUserInfo("name")?>" required>
            </label>

            <label for="phoneNumber"><b>Phone Number</b>
                <input name="phoneNumber" type="number" max="999999999" min="900000000" value="<?php echo account::getUserInfo("phoneNumber")?>" required>
            </label>

            <label for="address">
                <b>Address</b>
                <input name="address" type="text" placeholder="Your address .." value="<?php echo account::getUserInfo("address")?>" required>
            </label>

            <button type="submit">Update</button>
        </form>
    </div>

<?php }

function drawUserPage($user){ ?>
    <div class="user-page">
        <div id="userOpt">
            <h2>Options: </h2>
            <a href="../pages/change-password.php">Change password</a>
            <?php if (account::isRestaurantOwner()){ ?>
                <a href="../pages/manage-restaurant-list.php">Manage Your Restaurants</a>
            <?php }?>
            <a href="../pages/register-restaurant.php">Register restaurant</a>
            <a href="">Favourites</a>
            <a href="../pages/edit-profile.php">Edit  Profile</a>
            <a href="">My Orders</a>
            <form action="../database/logout.php" method="post">
                <button id="logOutBtn" formaction="database/logout.php">Logout</button>
            </form>
        </div>
        <div id="userInfo">
            <h2>Your personal info </h2>
            <img alt="user pic" src="<?=getimage($user['logo']) ?>" style="width: 100px; height: 100px">

            <label for="">  <b>Name:</b></label>
            <span><?=account::getUserInfo('name') ?> </span>

            <label for=""><b> E-mail:</b> </label>
            <span><?= account::getUserInfo('email')?> </span>

            <label for=""><b> Phone Number:</b> </label>
            <span><?= account::getUserInfo('phoneNumber')?> </span>

            <label for=""><b>Address:</b></label>
            <span><?= account::getUserInfo('address')?> </span>


        </div>
    </div>

    <div>
<?php }
