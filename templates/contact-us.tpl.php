<?php 
function realEmailSender(){
    if(isset($_POST['submit'])){
        $to = "up201805000@up.pt"; // this is your Email address
        $from = $_POST['email']; // this is the sender's Email address
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $subject = "Form submission";
        $subject2 = "Copy of your form submission";
        $message = $firstname . " " . $lastname . " wrote the following:" . "\n\n" . $_POST['message'];
        $message2 = "Here is a copy of your message " . $firstname . "\n\n" . $_POST['message'];
    
        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to,$subject,$message,$headers);
        mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
        header('Location: index.php'); 
        }
}

function fakeEmailSender(): void
{
    if(isset($_POST['submit']))
    {
        $from = $_POST['email']; 
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $message = "$firstname $lastname ($from) wrote the following:" . "\n\n" . $_POST['message'] . "\n\n";

        
    $fp = fopen('../emails/email.txt', 'a');
    fwrite($fp, $message);

    $message_divider="*************************************************************\n";
    fwrite($fp, $message_divider);
    fclose($fp);
    header('Location: index.php'); 
    }
}