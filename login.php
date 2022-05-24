<?php
session_start();
include_once('templates/elements.tpl.php');
include_once ('database/connection.php');
include_once ('database/account.php');

drawHeader();
if (account::isLoggedIn()){
    header("Location:index.php");
    exit();
}
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    account::login($_POST["email"],$_POST["password"]);
}
?>
    <form action="login.php" method="post" class="login">
        <h1>Login to your account</h1>
        <label for="email"><b>Email</b></label>
        <input name="email" required="required" type="email" placeholder="Enter email">
        
        <label for="password"><b>Password</b></label>
        <input name="password" type="password" required="required" placeholder="Enter password">

        <div id="login-checkbox">
            <input type="checkbox" checked name="stayloggedin">Stay logged in</input>
            <span class="psw">Forgot <a href="/recover-password.php">password?</a></span>
        </div>
        <button type="submit">Login</button>
    </form>
    <hr class="login-bar">
    <div class="login-newacc">
        <h2>Don't have an account?</h2>
        <button onclick=loginOnClick()>Sign Up here</button>
        
    </div>

<?php drawFooter() ?>

<script> 
 function loginOnClick(){
    window.location.href="./register.php"
 }
 </script>