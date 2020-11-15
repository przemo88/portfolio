<?php 


require_once "recaptchalib.php";
require_once "env.php";

    $secret = $_ENV['secret'];

    require_once "recaptchalib.php";
    
 

    
    $response = null;
 
    $reCaptcha = new ReCaptcha($secret);


    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}


    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));

    $email = filter_var(htmlspecialchars(stripslashes(trim($_POST["email"])), FILTER_SANITIZE_EMAIL));

    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
    
    $my_email = "kontakt@przemyslawprzewoznik.pl";
  
    $subject = "Wiadomość od $name wysłana przez formularz kontaktowy.";
    
    $email_content = "Imię: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Wiadomość: $message\n";
    
    $email_headers = "Od: $email";
    
    if ($response != null && $response->success) {
        $send_email = mail($my_email, $subject, $email_content, $email_headers);
        echo 'Dziękuję, twoja wiadomość została wysłana. Wkrótce odpowiem.'; 
      } else {
    
        echo  "Nie udało się wysłać twojej wiadomości. Sprawdź czy zaznaczyłeś captcha.";
      } 
?>
