<?php
session_start();
 require_once('./templates/elements.tpl.php');

 drawHeader() ?>


<body id="FAQ-body">
        <div id="FAQ">
        <h1 class="faq-heading">FAQ'S</h1>
        <section class="faq-container">
            <div class="faq-one">
               
                <h2 class="faq-page">What is x? </h2>
          
                <div class="faq-body">
                    <p> x is a website interface  where restaurants can provide
		their menu so anyone can order food without leaving home with comfort and security.</p>
                </div>
            </div>
            <hr class="hr-line">
            <div class="faq-two">
            
                <h2 class="faq-page">Why should I use x to order food?</h2>
              
                <div class="faq-body">
                    <p>bla bla bla bla bla </p>
                </div>
            </div>
            <hr class="hr-line">
            <div class="faq-three">
             
                <h2 class="faq-page">Can everyone use x?</h2>
             
                <div class="faq-body">
                    <p>x is open to everyone who wants to easily order food.</p>
                </div>
            </div>
        </section>
        </div>
    <script  src='javascript/faq.js'></script>
</body>

<?php
 drawFooter();
?>
   