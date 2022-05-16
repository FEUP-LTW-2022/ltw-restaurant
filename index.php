<?php 
  require_once('./database/connection.php');
  require_once('./database/restaurants.php');
  require_once('./templates/elements.php');
  

  $db = getDatabaseConnection();
  $restaurants = getAllRestaurants($db);

  drawHeader();
?>

    <main>
        <h1>Our Restaurants</h1>
        <section id="restaurants-list" >
        <?php foreach( $restaurants as $restaurant) { ?>
            <article>
                <img src="https://picsum.photos/350?<?=$restaurant['id']?>">
                <a href="restaurant.php?id=<?=$restaurant['id']?>"><?=$restaurant['name']?> <p> RATING:</p> </a>

            </article>
            <?php }?>
        </section>

    </main>
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

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

