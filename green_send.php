
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$to ="8085896694@tmomail.net";
$email= "hailing@hawaii.edu";
$sharie="8083084501@tmomail.net";
$gabe="8082189262@tmomail.net";
$from = "demo@gviloria.ics415.com";
$disaster="Land slide";
$alert=["SMS", "Email"];
$message ="$disaster Alert\nThis is a $disaster alert, please find a refuge as soon as possible! \nThis alert is not real, it's just a test!";
$headers = "From: $from\n";
mail($to, 'subject', $message, $headers);
mail($sharie, 'subject', $message, $headers);
mail($gabe, 'subject', $message, $headers);
mail($email, 'subject', $message, $headers);
;?>
<div class="ui container" id="main">
<div class="ui center aligned segment">
  <div class="ui green inverted raised segment">
    <h2>TEST ALERT SENT SUCCESSFULLY！</h2>
  </div>
  <H3>Dsaster Type: <?php echo $disaster ?> </H3>
  <H3>Alert Type: 
      <?php for($x = 0; $x < count($alert); $x++) {
         echo $alert[$x];
         echo "; ";
        } ?> 
  </H3>
  </br></br>
  <a href="main.html" style="text-decoration: underline;">&lt;Back to Home Page</a>
</div>
    
</div>
</body>
</html>