<?php

$fromerror = array();
if(isset($_POST['Name'])){
    $name = filter_var($_POST['Name'],FILTER_SANITIZE_STRING);
}
if(isset($_POST['Mobilenumber'])){
    $filternumber = filter_var($_POST['Mobilenumber'],FILTER_SANITIZE_NUMBER_INT);
}
if(isset($_POST['Message'])){
    $filtermessage = filter_var($_POST['Message'],FILTER_SANITIZE_STRING);
}
if(isset($_POST['Email'])){
    $filteremail = filter_var($_POST['Email'],FILTER_SANITIZE_EMAIL);
    if(filter_var($filteremail,FILTER_VALIDATE_EMAIL)!= true){
        $formerror = 'This Email Is Not Valide';
    }
}
$to      = 'mohamed.elkomy1995@gmail.com';
$subject = $name .  $filternumber;
$message = $filtermessage;
$email = $filteremail;
$headers = array(
    'From' => $email,
    'Reply-To' => $to,
    'X-Mailer' => 'PHP/' . phpversion()
);

mail($to, $subject, $message, $headers);
header('location:index.html');
?>