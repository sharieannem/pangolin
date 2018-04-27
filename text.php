<?php
$to = "8085896694@tmomail.net";
$s = "8083084501@tmomail.net";
$email = "hailing@hawaii.edu";
$from = "demo@gviloria.ics415.com";
$message = "This is a test";
$headers = "From: $from\n";
mail($to, '', $message, $headers);
mail($email, '', $message, $headers);
mail($s, '', $message, $headers);

?>