<?php /*
  $db = new PDO('sqlite:database/database.db');

  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
  FROM news JOIN
       users USING (username) LEFT JOIN
       comments ON comments.news_id = news.id
  GROUP BY news.id, users.username
  ORDER BY published DESC');

  $stmt->execute();
*/
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