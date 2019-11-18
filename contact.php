<?php

if(isset($_POST['send'])){

    $name = $_POST['name'];
    $subject = $_POST['email'];
    $message = $_POST['message'];
    
    $to = "przemyslaw.przewoznik@yahoo.com";
    $headers = "From: $subject";

    mail($to,$subject,$message,$headers);
}

?>