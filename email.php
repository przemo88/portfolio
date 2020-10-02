<?php

    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));

    $email = filter_var(htmlspecialchars(stripslashes(trim($_POST["email"])), FILTER_SANITIZE_EMAIL));

    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
    
    $my_email = "kontakt@przemyslawprzewoznik.pl";
  
    $subject = "Wiadomość od $name wysłana przez formularz kontaktowy.";
    
    $email_content = "Imię: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Wiadomość: $message\n";
    
    $email_headers = "Od: $email";
    
    $send_email = mail($my_email, $subject, $email_content, $email_headers);
    
    if($send_email){ 
        echo "Dziękuję,  twoja wiadomość została wysłana"; 
    } else {
  
        echo "Nie udało się wysłać twojej wiadomości. Spróbuj ponownie albo użyj linka w sekcji o mnie ";
    }
 
?>