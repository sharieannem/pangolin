<!DOCTYPE html>
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
<div class="ui segment">
  <div class="active title">
    <h2 id="header">TEST OR REAL ALERT?</h2>
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
<script>
function changeAction(val) {
    document.forms[0].action = val;
}
</script>

<form method="post" action="addwarningdb.php">
  <div class="active content">
    <div class="ui grid">
      <div class="two centered column row">
        <div class="ui six wide column" style="border-right: 5px solid black;">
          <div class="border">
          <input class="ui green button" name="Warning" onclick="methodType('test'); changeAction('addwarningdb.php');" id="test" value="test" style="width: 180px; border-radius: 10%;">
            <div style="text-align: center;">
              <i class="check icon" style="font-size:100px; color:#DADADA;margin-top: 50px;"></i>
              <p style="font-size: 40px;  margin-top: -50px;">Test</p>
            </div>
         
          </div>
        </div>
        <div class="ui six wide column">
          <div class="border">
          <input class="ui red button " name="Warning" onclick="methodType('real'); changeAction('redaddwarningdb.php');" id="real" value="real" style="width: 180px;border-radius: 10%;">
            <div style="text-align: center;">
              <i class="exclamation triangle icon" style="font-size:100px; color:#F9CA47;margin-top: 50px;"></i>
              <p style="font-size: 40px; margin-top: -50px;" > Real </p>
            </div>
          
          </div>
        </div>
      </div> <!-- end of 1st row -->
      <div class="four column row">
          <div class="ui right floated column">
            <input class="ui button method" type="submit" value="Submit">
            </form>
          </div>
      </div> <!-- end of column and 2nd row -->
    </div><!-- end of  grid -->
  </div>
</div>
</div>

<script>
  var method = "";
  var i = 0;
  
  function methodType(ident) {
      var isBorder;
      
      method = ident;
      console.log(method);
      
      if(method == "test") {
          isBorder = document.getElementsByClassName("border");
          isBorder[0].style.border = "1px solid black";
          
          if(isBorder[1].style.border == "1px solid black") {
              isBorder[1].style.border = "none";
          }
      }
      else if(method == "real") {
          isBorder = document.getElementsByClassName("border");
          isBorder[1].style.border = "1px solid black";
          
          if(isBorder[0].style.border == "1px solid black") {
              isBorder[0].style.border = "none";
          }
      }
      
      isMethodSelected();
  }
  
  function isMethodSelected() {
      var color;
      
      if(method != "" && i == 0) {
        i++;
        color = document.getElementsByClassName("ui button method");  
        color[0].className = "ui blue button method";
          
        //   document.getElementById("method").style.backgroundColor = "blue";
      }
  }
  
  function changeAction(val) {
    document.forms[0].action = val;
  }
    
</script>

</body>
</html>
