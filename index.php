<?php 
  $db = new PDO('sqlite:database/database.db');

  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $db->prepare('SELECT restaurant.* FROM restaurant
   LEFT JOIN reviews ON reviews.restaurant_id=restaurant.id 
   LEFT JOIN dish ON dish.restaurant_id=restaurant.id
  GROUP BY restaurant.id');

  $stmt->execute();
  $restaurants = $stmt->fetchAll();
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

    <section id="restaurants-examples">
    <?php foreach( $restaurants as $restaurant) { ?>
      <article>
        <header>
          <h1><a href="item.php?id=<?= $restaurant['id'];?>"> <?=  $restaurant['name']; ?> </a></h1>
        </header>
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