<?php

//Check if there is any post
if($_SERVER["REQUEST_METHOD"] == 'POST') {
     //Get variable and sanitize values
     $name       = strip_tags(trim($_POST['name']));
     $email      = filter_var(trim($_POST['name']), FILTER_SANITIZE_EMAIL);
     $message    = trim($_POST['message']);
     $recipient = $_POST['recipient'];
     $subject    = $_POST['subject'];

     //Form Validation
     if( empty($name) OR empty($message) OR empty($email) ) {
          http_response_code(400);
          echo "Please field the form carefully and try again";
          exit;
     }

     //Display Message
     $message = "Name: $name\n";
     $message .= "Email $email\n\n";
     $message .= "Message: \n$message\n";

     //Build Header
     $header = "From: $name<$email>";

     //Send the Email
     if(mail($recipient, $subject, $message, $header)) {
          http_response_code(200);
          echo "Thanks, we recieved your message";
     }else {
          http_response_code(500);
          echo "Ooops! there is some problem";
     }


}else {
     //set 403 fornidden Response
     http_response_code(403);
     echo "There is error, please try again";
}
