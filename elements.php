<?php

function generateHeader(){
    echo'
    <header>
        <a href="index.php">
            <img src="logo.jpeg" alt="logo">
        </a>
        <form id="search-bar">
            <input type="text" placeholder="Restaurant, city, ...">
        </form>
        <div id="signup">
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
      </div>
    </header>
   ';
}

function generateFooter(){}

function generateRestaurantElement(){}

function generateDishElement(){}
