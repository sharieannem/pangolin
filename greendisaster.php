<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 style="text-align: center;">EMERGENCY ALERT SYSTEM</h1>

<div class="ui container" id="main">
  <div class="ui green inverted raised segment">
    <h2 id="header">DISASTER TYPES</h2>
  </div>

<form method="post" action="adddisasterdb.php">
    
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

    $id = $_GET["id"];
    
    $query = "SELECT * FROM SYSTEMDATA WHERE id = $id";
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
    
<div class="ui raised segment">
<div class="content">
<div class="ui grid">
  <div class="centered row" style="margin:2em;">
    <div class="five wide column">
      <div class="border">
      <input class="ui button disaster_type" type="radio" id="surf" name="Disaster" value="surf">
        <span class="disaster">High Surf</p>
      </div>
    </div>
    <div class="five wide column">
      <div class="border">
      <input class="ui button disaster_type" type="radio" id="land" name="Disaster" value="landslide">
        <span class="disaster">Landslide</p>
      </div>
    </div>
    <div class="five wide column">
      <div class="border">
        <input class="ui button disaster_type"  type="radio" id="tsunami" name="Disaster" value="tsunami">
        <span class="disaster">Tsunami</p>
      </div>
    </div>
  </div> <!end of 1st row>
  <div class="centered row" style="margin:0 0 2em 0;">
    <div class="five wide column">
      <div class="border">
      <input class="ui button disaster_type" type="radio" id="amber" name="Disaster" value="alert">
        <span class="disaster">Amber Alert</p>
      </div>
    </div>
    <div class="five wide column">
      <div class="border">
      <input class="ui button disaster_type" type="radio" id="missile" name="Disaster" value="missile">
        <span class="disaster">Ballistic Missile</span>
      </div>
    </div>
    <div class="five wide column">
      <div class="border">
      <input class="ui button disaster_type" type="radio" id="volcano" name="Disaster" value="volcano">
        <span class="disaster" name="Disaster" value="volcano">Volcano</p>
      </div>
    </div>
  </div> <!end of 2nd row>
  <div class="four column row">
    <div class="ui left floated column">
      <div class="ui button back" onclick="redirect()">
          <i class="huge caret left icon"></i>
      </div>
    </div>
    <div class="ui right floated column">
      <input class="ui button" onclick="changeAction('adddisasterdb.php');"type="submit" value="Submit">
    </div>
  </div> <!end of column and 2nd row>
</div><!end of  grid>
</div>
    
</div>

</form>

</div>

<script>

  var disaster = " ";
  var i = 0;

//   $('.ui .item').on('click', function() {
//     $('.ui .item').removeClass('active');
//     $(this).addClass('active');
//   });
  
  function disasterType(typeDis) {
      var isBorder;
      
      disaster = typeDis;
      console.log(typeDis);
      
      switch(disaster) {
          case "surf":
              makeSelection(0);
              break;
          case "land":
              makeSelection(1);
              break;
          case "tsunami":
              makeSelection(2);
              break;
          case "amber":
              makeSelection(3);
              break;
          case "missile":
              makeSelection(4);
              break;
          case "volcano":
              makeSelection(5);
              break;
          default:
              break;
      }
      
      isMethodSelected();
  }
  
  function makeSelection(num) {
      isBorder = document.getElementsByClassName("border");
      isBorder[num].style.border = "1px solid black";
        
      for(var i = 0; i < isBorder.length; i++) {
        if(isBorder[i].style.border == "1px solid black" && i != num) {
            isBorder[i].style.border = "none";
        }
      }
  }
  
  function isMethodSelected() {
      var color;
      
      if(disaster != "" && i == 0) {
        i++;
        color = document.getElementsByClassName("ui button disaster");  
        color[0].className = "ui blue button disaster";
      }
  }
  
  function redirect() {
    location.href = "main.php";
  }
  
  
  function changeAction(val) {
    var id = "<?php echo $id ?>";
    var link = "?id=";
    document.forms[0].action = val + link + id;
  }
  
</script>

</body>
</html>
