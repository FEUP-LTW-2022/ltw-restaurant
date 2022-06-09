<?php
session_start();
require_once('./templates/elements.tpl.php');
require_once('./templates/contact-us.tpl.php');

//realEmailSender(); // probably working, not tested
fakeEmailSender();
drawHeader();
?>
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

<?php drawFooter(); ?>