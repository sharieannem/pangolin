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
            while ($i < $num) {
                $warning = mysqli_result($result, $i, "Warning");
                $disaster = mysqli_result($result, $i, "Disaster");
                $alert = mysqli_result($result, $i, "Alert");
                $i++;
                
$hailing = "8085896694@tmomail.net";
$email= "hailing@hawaii.edu";
$to="8083084501@tmomail.net";
$smail="mamuads3@hawaii.edu";
$gabe="8082189262@tmomail.net";
$from = "demo@gviloria.ics415.com";
$message ="Sorry, the $disaster alert sent earlier was mistake!";
}
$headers = "From: $from\n";
mail($to, 'subject', $message, $headers);
mail($email, 'subject', $message, $headers);
;?>
<div class="ui container" id="main">
<div class="ui center aligned segment">
    <h2 >Mistake alert notification has been sent successfully！</h2>
  </br></br>
  <a href="main.php" style="text-decoration: underline;">&lt;Back to Home Page</a>
</div>
    
</div>
</body>
</html>