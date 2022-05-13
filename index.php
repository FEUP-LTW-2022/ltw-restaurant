<?php 

  $db = new PDO('sqlite:database/database.db');

  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $db->prepare('SELECT restaurant.id, reviews.rate, dish.name FROM restaurant
   LEFT JOIN reviews ON reviews.restaurant_id=restaurant.id 
   LEFT JOIN dish ON dish.restaurant_id=restaurant.id
  GROUP BY restaurant.id');

  $stmt->execute();

  require_once('templates/elements.php');

  generateHeader();
?>



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