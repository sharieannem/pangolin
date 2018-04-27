<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="ui container" id="main">
  <h1 style="text-align: center;">EMERGENCY ALERT SYSTEM</h1>
<div class="ui red inverted raised segment">
  <div class="title">
    <h2 id="header">ARE YOU SURE THIS IS A REAL WARNING?</h2>
  </div> <!-- div -->
</div> <!-- segment -->
<div class="ui raised segment">
  <div class="ui grid">
    <div class="eight wide column">
        
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
            $id = $_GET["id"];
            $query = "SELECT * FROM SYSTEMDATA WHERE id = $id";
            $result = mysqli_query($dbConnection, $query);
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
                    $alert_s = 'Siren, ';
                } else {
                    $alert_s = '';
                }
                
                if ($alert_r == 1){
                    $alert_r = 'Radio, ';
                } else {
                    $alert_r = '';
                }
                
                if ($alert_t == 1){
                    $alert_t = 'Text, ';
                } else {
                    $alert_t = '';
                }
                
                if ($alert_tv == 1){
                    $alert_tv = 'Television';
                } else {
                    $alert_tv = '';
                }
                echo '<h2>You are sending a '. $warning .' Alert for a ' . ucfirst($disaster) .' disaster by '. $alert_s .'',''. $alert_r .'',''. $alert_t .'',''. $alert_tv .'','. ';
                $i++;
            }
            mysqli_close($dbConnection);
            ?>
            

      <div class="field" style="margin-right: 10em;padding-top: 2em;">
        <div class="ui radio checkbox">
          <input type="radio" name="confirm" checked="checked">
          <label>YES</label>
        </div>
      </div>

      <div class="field" style="padding-top: 2em;padding-bottom: 2em;">
        <div class="ui radio checkbox">
          <input type="radio" name="confirm">
          <label>NO</label>
        </div>
      </div>

    </div>
  
    <div class="four column row">
      <div class="ui left floated column">
        <div class="ui button back" onclick="redirectB()">
          <i class="huge caret left icon"></i>
        </div>
      </div>
      <div class="ui right floated column">
        <button class="ui button" onclick="redirectC()">CONFIRM
        </button>
      </div>
    </div>
  </div>
</div>
</div> <!-- ui container -->

<script>

$('.ui .item').on('click', function() {
    $('.ui .item').removeClass('active');
    $(this).addClass('active');
});
$('.ui.accordion')
    .accordion();
    
function redirectB() {
    var id = "<?php echo $id ?>";
    var link = "?id=";
    location.href = "redalert.php + link + id";
}
function redirectC() {
    var v=document.getElementsByName ("confirm")
    if (v[0].checked){
    	location.href = "send.php?id=<?php echo $id?>";
    } else {
    	location.href = "main.php";	
    }
}
</script>
   
</body>
</html>

