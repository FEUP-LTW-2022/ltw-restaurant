<?php
require_once('./templates/elements.tpl.php');
drawHeader();
?>
<!DOCTYPE html>
    <div class="container">
        <div style="text-align:center">
            <h2>Contact Us</h2>
            <p>Leave us a message:</p>
        </div>
        <div class="row">
            <div class="column">
                <img src="/contact.png" style="width:50% align=”middle">
                <h2>Contacts</h2>
                <p>Cape Verde: +238 26184848/9982132 </p>
                <p>Portugal: +351 231488549/931453211</p>
                <p>Brazil: +55 993737382</p>
            </div>
            <div class="column">
                <form action="/action_page.php">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>
                    <label for="fname">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your personal email.." required>
                    <label for="country">Country</label>
                    <select id="country" name="country">
                        <option value="cape verde">Cape Verde</option>
                        <option value="portugal">Portugal</option>
                        <option value="brazil">Brazil</option>
                    </select>
                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>



<?php drawFooter(); ?>