<?php
function drawAboutUs(){ ?>
    <script src='../javascript/about-us.js'></script>

    <div id="AboutUsPageInfo" class= "AboutUsPage">
        <div class = "AboutUsBox">
            <div class = "AboutUsTitle">
                About Us
            </div>
            <hr class = "AboutUsHR">
            <div id = "AboutUsInfo">
                We are a group of three students from FEUP that decided to create a website where restaurants can provide
                their menu so anyone can order food without leaving home with comfort and security.
            </div>
            <div class = "AboutUsDivButton">
                <div id = "AboutUsMembersButton" class = "AboutUsButton" onclick = "showMembersTeam('AboutUsPageInfo','AboutUsPageMembers')">
                    More About Team
                </div>
            </div>
        </div>
    </div>

    <div id = "AboutUsPageMembers" class ="AboutUsPage">
        <div class = "AboutUsBox">
            <div class = "AboutUsTitle">
                Our Developer's Team
            </div>
            <hr class = "AboutUsHR">
            <div id = "AboutUsTeamDiv">
                <div class = "AboutUsMemberSpace">
                    <div class = "AboutUsMember">
                        <div class = "AboutUsMemberName">
                            Henrique Pinho
                            <div class = "AboutUsMembersInfo">
                                <div class = "AboutUsDivIcon">
                                    <i class="fas fa-envelope iconUserPage AboutUsIcon"></i>
                                    <p class="userEmail AboutUsEmail"> up201805000@up.pt </p>
                                </div>
                                <div class = "AboutUsDivIcon">
                                    <i class="fas fa-briefcase iconUserPage AboutUsIcon"></i>
                                    <p class="AboutUsEmail"> FEUP </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "AboutUsMemberPhoto">
                        <img src = "/images/avatars/Henrique.jpg" alt= "Henrique" class = "AboutUsPhoto" id = "tempProfilePhoto1">
                    </div>
                </div>

                <div class = "AboutUsMemberSpace">
                    <div class = "AboutUsMemberPhoto">
                        <img src = "/images/avatars/Ricardo.png" alt= "Ricardo" class = "AboutUsPhoto" id = "tempProfilePhoto2">
                    </div>

                    <div class = "AboutUsMember">
                        <div class = "AboutUsMemberName">
                            Ricardo Cruz
                            <div class = "AboutUsMembersInfo">
                                <div class = "AboutUsDivIcon">
                                    <i class="fas fa-envelope iconUserPage AboutUsIcon"></i>
                                    <p class="userEmail AboutUsEmail"> up202008789@up.pt </p>
                                </div>
                                <div class = "AboutUsDivIcon">
                                    <i class="fas fa-briefcase iconUserPage AboutUsIcon"></i>
                                    <p class="AboutUsEmail"> FEUP </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "AboutUsMemberSpace">
                    <div class = "AboutUsMember">
                        <div class = "AboutUsMemberName">
                            Tiago Pires
                            <div class = "AboutUsMembersInfo">
                                <div class = "AboutUsDivIcon">
                                    <i class="fas fa-envelope iconUserPage AboutUsIcon"></i>
                                    <p class="userEmail AboutUsEmail"> up202008790@up.pt </p>
                                </div>
                                <div class = "AboutUsDivIcon">
                                    <i class="fas fa-briefcase iconUserPage AboutUsIcon" ></i>
                                    <p class="AboutUsEmail"> FEUP </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "AboutUsMemberPhoto">
                        <img src =  "/images/avatars/Tiago.jpg" alt= "Tiago" class = "AboutUsPhoto" id = "tempProfilePhoto3">
                    </div>
                </div>
            </div>

            <div class = "AboutUsDivButton">
                <div id = "AboutUsGoBackButton" class = "AboutUsButton" onclick = "goBack('AboutUsPageInfo','AboutUsPageMembers')">
                    Back To About Us Page
                </div>
            </div>
        </div>
    </div>
<?php }

function drawFAQ(){ ?>
    <body id="FAQ-body">
    <div id="FAQ">
        <h1 class="faq-heading">FAQ'S</h1>
        <section class="faq-container">
            <div class="faq-one">

                <h2 class="faq-page">What is Food Boutique? </h2>

                <div class="faq-body">
                    <p> Food Boutique is a website interface  where restaurants can provide
                        their menu so anyone can order food without leaving home with comfort and security.</p>
                </div>
            </div>
            <hr class="hr-line">
            <div class="faq-two">

                <h2 class="faq-page">Why should I use Food Boutique to order food?</h2>

                <div class="faq-body">
                    <p> Food Boutique is a safe and easy place where you can order your food. </p>
                </div>
            </div>
            <hr class="hr-line">
            <div class="faq-three">

                <h2 class="faq-page">Can everyone use Food Boutique?</h2>

                <div class="faq-body">
                    <p>Food Boutique is open to everyone who wants to easily order food.</p>
                </div>
            </div>
        </section>
    </div>
    <script  src='../javascript/faq.js'></script>
    </body>
<?php }

function drawContactUs(){ ?>

    <div class="ContactUs">
  <div class="ContactUs-header">
      <h2>Contact Us</h2>
      <h3 id="text">
        To contact us please fill out this form or contact us via email@email.com
    </h3>
  </div>

  <div class="ContactUs-container">
    <form action="" method="post">
      <label for="fname"><b> Name</b></label>
      <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

      <label for="lname"><b>Last Name</b></label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

      <label for="email"><b>Email</b></label>
      <input type="text" id="email" name="email" placeholder="Your email.." required>

      <label for="subject"><b>Subject</b></label>
      <textarea id="subject" name="message" placeholder="Write something.." style="height:200px" required></textarea>

      <input type="submit" name="submit" value="Submit">
    </form>
  </div>
</div>
<?php }