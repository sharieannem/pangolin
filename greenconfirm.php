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
<div class="ui green inverted raised segment">
  <div class="title">
    <h2 id="header">IS THIS A DRILL WARNING?</h2>
  </div>
</div>
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
                echo '<h2>You are sending a '. $warning .' warning for a ' . $disaster .' disaster by '. $alert .'. ';
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
  </div>
  <div class="four column row"><div class="ui right floated column">
    <button class="ui button"><a href="send.php">CONFIRM</a></button>
  </div></div>
</div>
</div>
      <script>
        $('.ui .item').on('click', function() {
          $('.ui .item').removeClass('active');
          $(this).addClass('active');
        });
        $('.ui.accordion')
            .accordion()
        ;
      </script>
    </body>
    </html>
