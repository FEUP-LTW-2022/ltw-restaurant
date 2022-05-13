<?php 
  require_once('./database/connection.php');
  require_once('./database/restaurants.php');

  $db = getDatabaseConnection();
  $restaurants = getAllRestaurants($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
</head>
<body>
    <header>
        <a href="index.php">
            <img src="logo.jpeg" alt="logo">
        </a>
        <form id="search-bar" action="search-results.php" method="get">
            <input type="text" name="search-bar" placeholder="Restaurant, city, ...">
        </form>
        <div id="signup">
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
      </div>
    </header>

    <section id="restaurants-list" >
        <h1>Our Restaurants</h1>
    <?php foreach( $restaurants as $restaurant) { ?>
          <h1><a href="item.php?id=<?= $restaurant['id'];?>"> <?=  $restaurant['name']; ?> </a></h1>
        <?php }?>
    </section>
</body>
</html>

<script>
document.getElementById('search-bar')
    .addEventListener('keyup', function(event) {
        if (event.code === 'Enter')
        {
            event.preventDefault();
            document.querySelector('form').submit();
        }
    });
</script>