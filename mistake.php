
text/x-generic send.php ( HTML document, UTF-8 Unicode text )
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    $host = 'localhost';
    $user = 'gviloria_pango';
    $pass = 'teampangolin';
    $db = 'gviloria_ALERT';
            $dbConnection = new mysqli($host, $user, $pass, $db);
            if (mysqli_connect_errno()) {
                printf("Could not connect to the mySQL database: %s\n", mysqli_connect_error());
                exit();
            }
            // Basic Select Statement to check if the table exists
            $query = "SELECT * FROM SYSTEMDATA";
            $result = mysqli_query($dbConnection, $query);
            $num = $result->num_rows;
            $i = 0;
            function mysqli_result($result, $row, $field = 0)
            {
                // Adjust the result pointer to that specific row
                $result->data_seek($row);
                // Fetch result array
                $data = $result->fetch_array();
                return $data[$field];
            }
            while ($i < 1) {
                $warning = mysqli_result($result, $i, "Warning");
                $disaster = mysqli_result($result, $i, "Disaster");
                $alert_s = mysqli_result($result, $i, "Alert_Siren");
                $alert_r = mysqli_result($result, $i, "Alert_Radio");
                $alert_t = mysqli_result($result, $i, "Alert_Text");
                $alert_tv = mysqli_result($result, $i, "Alert_TV");
                
                if ($warning == 'real'){
                    $warning = 'REAL';
                } else {
                    $warning = 'DRILL';
                }
                
                if ($alert_s == 1){
                    $alert_s = 'Siren ';
                } else {
                    $alert_s = '';
                }
                
                if ($alert_r == 1){
                    $alert_r = 'Radio ';
                } else {
                    $alert_r = '';
                }
                
                if ($alert_t == 1){
                    $alert_t = 'Text ';
                } else {
                    $alert_t = '';
                }
                
                if ($alert_tv == 1){
                    $alert_tv = 'Email';
                } else {
                    $alert_tv = '';
                }
                $i++;
            }
$hailing = "8085896694@tmomail.net";
$email= "hailing@hawaii.edu";
$to="8083084501@tmomail.net";
$smail="mamuads3@hawaii.edu";
$gabe="8082189262@tmomail.net";
$from = "demo@gviloria.ics415.com";
$message ="Sorry, the $disaster alert sent earlier was mistake!";
$headers = "From: $from\n";
mail($hailing, 'subject', $message, $headers);
mail($email, 'subject', $message, $headers);
mail($to, 'subject', $message, $headers);
mail($smail, 'subject', $message, $headers);
mail($gabe, 'subject', $message, $headers);


ucfirst($warning);
ucfirst($disaster);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);
try{
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->isHTML(true);
$mail->Username = "theteampangolin@gmail.com";
$mail->Password = "1pangolin";
$mail->setFrom("theteampangolin@gmail.com");
$mail->Subject = "Test";
$mail->Body = "Sorry, the $disaster alert sent earlier was mistake!";
$mail->addAddress("gviloria@hawaii.edu");
$mail->addAddress("theteampangolin@gmail.com");
$mail->addAddress("hailing@hawaii.edu");
$mail->addAddress("mamuads3@hawaii.edu");
$mail->addAddress("8085896694@tmomail.net");

$mail->Send();
echo 'Message sent';
} catch (Exception $e) {
echo 'Message could not be sent. Error:' , $mail->ErrorInfo;
}
?>

<div class="ui container" id="main">
<div class="ui center aligned segment">
  <div class="ui red inverted raised segment">
    <h2>Mistake alert notification has been sent successfully！</h2>
  </div>
  </br></br>
  <a href="main.php" style="text-decoration: underline;">Back to Home Page</a>
</div>
    
</div>
</body>
</html>