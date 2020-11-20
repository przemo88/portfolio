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


    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if(empty($name)){
      $errors[] = "Imię";
    }
    
    if(empty($email)){
      $errors[] = "Email";
    }

    if(empty($message)){
      $errors[] = "Wiadomość";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $output = json_encode(array('type'=>'error', 'text' => 'Błędny adres email.'));
          die($output);
    }

    if(!empty($errors)) {
      $output = json_encode(array('type'=>'error', 'text' =>'Uzupełnij pola: ' . implode(", ",$errors)));
          die($output);
    }
    

    $my_email = "kontakt@przemyslawprzewoznik.pl";
  
    $subject = "Wiadomość od $name wysłana przez formularz kontaktowy.";
    
    $email_content = "Imię: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Wiadomość: $message\n";
    
    $email_headers = "Od: $email";
    
    if ($response != null && $response->success) {
        mail($my_email, $subject, $email_content, $email_headers);
        $result = json_encode(array('type' => 'success', 'text' => 'Dziękuję, twoja wiadomość została wysłana.',
      'class' => 'alert alert-success text-center'));
        die($result); 
      } else {
        $result = json_encode(array('type' => 'error', 'text' => 'Błąd -  Sprawdź czy zaznaczyłeś captcha.',
        'class' => 'alert alert-danger text-center'));
        die($result); 
      } 
?>
