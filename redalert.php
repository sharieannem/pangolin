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
    <h2 id="header">ALERT TYPE</h2>
  </div>
</div>
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

    $query = "SELECT * FROM SYSTEMDATA WHERE id = 1";
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
        $id = mysqli_result($result, $i, "id");
        $warning = mysqli_result($result, $i, "Warning");
        $disaster = mysqli_result($result, $i, "Disaster");
        $alert = mysqli_result($result, $i, "Alert");
        $i++;
    }
    mysqli_close($dbConnection);
?>

<form method="post" action="redaddalertdb.php">
    
<div class="ui raised segment">
    <div class="content" id="sections">
        <h3>SELECT ALL THAT APPLY:</h3>
      </div>
  <div class="ui grid">
    <div class="eight wide column">
      <div class="field" style="margin: 20px 0 40px 0;">
        <div class="ui checkbox" name="Alert" value="siren">
  
          <input type="checkbox" class="chkbox" name="Alert" value="siren">
          <label>Warning Sirens</label>
        </div>
      </div>
      <div class="field" style="margin: 40px 0 20px 0;">
        <div class="ui checkbox" name="Alert" value="radio">

          <input type="checkbox" class="chkbox" name="Alert" value="radio">
          <label>Radio Stations</label>
        </div>
      </div>

    </div>

    <div class="eight wide column">

      <div class="field" style="margin: 20px 0 40px 0;">
        <div class="ui checkbox" name="Alert" value="text">
   
          <input type="checkbox" class="chkbox" name="Alert" value="text">
          <label>Text Messages</label>
        </div>
      </div>

      <div class="field" style="margin: 40px 0 20px 0;">
        <div class="ui checkbox" name="Alert" value="television">
  
          <input type="checkbox" class="chkbox" name="Alert" value="television">
          <label>Television</label>
        </div>
      </div>

    </div>
  </div>
  <div class="four column row"><div class="ui right floated column">
    <input class="ui button" type="submit" value="Submit">
    </form>
  </div></div>
  
  
</div>
</div>
    </body>
    </html>
