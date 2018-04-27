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
    $id = $_GET["id"];
?>

<form method="post" action="redaddalertdb.php">
    
<div class="ui raised segment">
  <div class="content" id="sections">
      <h3>SELECT ALL THAT APPLY:</h3>
  </div>
  <div class="ui grid">
    <div class="eight wide column">
      <div class="field" style="margin: 20px 0 40px 0;">
        <div class="ui checkbox" name="Alert_Siren"  id="Alert_Siren" value="1">
          <input type="checkbox" class="chkbox" name="Alert_Siren"  id="Alert_Siren" value="1">
          <label>Warning Sirens</label>
        </div>
      </div>

      <div class="field" style="margin: 40px 0 20px 0;">
        <div class="ui checkbox" name="Alert_Radio"  id="Alert_Radio" value="1">
          <input type="checkbox" class="chkbox" id="Alert_Radio" name="Alert_Radio" value="1">
          <label>Radio Stations</label>
        </div>
      </div>

    </div>

    <div class="eight wide column">

      <div class="field" style="margin: 20px 0 40px 0;">
        <div class="ui checkbox" name="Alert_Text" value="1"  id="Alert_Text">
          <input type="checkbox" class="chkbox" name="Alert_Text" value="1" id="Alert_Text">
          <label>Text Messages</label>
        </div>
      </div>

      <div class="field" style="margin: 40px 0 20px 0;">
        <div class="ui checkbox" name="Alert_TV" value="1" id="Alert_TV">
          <input type="checkbox" class="chkbox" name="Alert_TV" value="1"  id="Alert_TV">
          <label>Email</label>
        </div>
      </div>

    </div>
  
    <input type="hidden" id= "id" name="id" value="<?php echo $id ?>"
                
    <div class="four column row">
        <div class="twelve wide column"></div>
        <div class="four wide column"> 
            <input class="ui button" type="submit" value="Submit">
        </div>
    </div>    
  </div>
</div><!-- ui segment -->

</form>

</div>

</body>
</html>
