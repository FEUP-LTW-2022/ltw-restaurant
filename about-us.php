<?php
require_once('./templates/elements.tpl.php');
drawHeader();
?>
<!DOCTYPE html>
<div class="about-section">
    <h1>About Us</h1>
    <p>We are a group of three students from FEUP(Henrique Pinho, Ricardo da Cruz e Tiago Pires) that decided to create a website where restaurants can provide their menu so anyone can buy food without leaving home with comfort and security.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row1">
    <div class="column1">
        <div class="card">
            <img src="/Henrique.jpg" alt="Henrique" style="width:10%">
            <div class="container">
                <h2>Henrique Pinho</h2>
                <p class="title">CEO & Founder</p>
                <p>Computer Science and engineering student at FEUP.</p>
                <p>henrique@example.com</p>
                <p><button class="button">Contact : 924457357</button></p>
            </div>
        </div>
    </div>

    <div class="column1">
        <div class="card">
            <img src="/Ricardo.png" alt="Ricardo" style="width:10%">
            <div class="container">
                <h2>Ricardo da Cruz</h2>
                <p class="title">CEO & Founder</p>
                <p>Computer Science and engineering student from Cape Verde at FEUP.</p>
                <p>ricardo.cruz200230@gmail.com</p>
                <p><button class="button">Contact : 910329487</button></p>
            </div>
        </div>
    </div>

    <div class="column1">
        <div class="card">
            <img src="/Tiago.jpg" alt="Tiago" style="width:10%">
            <div class="container">
                <h2>Tiago Pires</h2>
                <p class="title">CEO & Founder</p>
                <p>Computer Science and engineering student from Cape Verde at FEUP.</p>
                <p>blackalbino17@gmail.com</p>
                <p><button class="button">Contact : 932906904</button></p>
            </div>
        </div>
    </div>
</div>
<?php drawFooter(); ?>
