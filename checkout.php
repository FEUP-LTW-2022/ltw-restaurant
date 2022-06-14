<?php
session_start();
require_once('./templates/elements.tpl.php');
drawHeader();?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="checkout">
        <div class="col-75">
            <div class="container">
                <form action="">
                    <div class="col-50">
                        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
                        <p><span>Product 1</span> <span class="price">15</span></p>
                        <p><span>Product</span> <span class="price">5</span></p>
                        <p><span>Product</span> <span class="price">8</span></p>
                        <p><span>Product</span> <span class="price">2</span></p>
                        <hr>
                        <p>Total <span class="price" style="color:black"><b>$30</b></span></p>

                    </div>

                    <input type="submit" value="Continue to checkout" class="btn">
                </form>
            </div>
        </div>

    </div>
<?php drawFooter();


