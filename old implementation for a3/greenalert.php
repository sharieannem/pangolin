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
    <h2 id="header">ALERT TYPE</h2>
  </div>
</div>


<form method="post" action="addalertdb.php">
    
<div class="ui raised segment">
    <div class="content" id="sections">
        <h3>SELECT ALL THAT APPLY:</h3>
      </div>
  <div class="ui grid">
    <div class="eight wide column">
      <div class="field" style="margin: 20px 0 40px 0;">
        <div class="ui checkbox" name="Alert"  id="Alert" value="siren">
          <input type="checkbox" class="chkbox" name="Alert"  id="Alert" value="siren">
          <label>Warning Sirens</label>
        </div>
      </div>

      <div class="field" style="margin: 40px 0 20px 0;">
        <div class="ui checkbox" name="Alert"  id="Alert" value="radio">
          <input type="checkbox" class="chkbox" id="Alert" name="Alert" value="radio">
          <label>Radio Stations</label>
        </div>
      </div>

    </div>

    <div class="eight wide column">

      <div class="field" style="margin: 20px 0 40px 0;">
        <div class="ui checkbox" name="Alert" value="text"  id="Alert">
          <input type="checkbox" class="chkbox" name="Alert" value="text" id="Alert">
          <label>Text Messages</label>
        </div>
      </div>

      <div class="field" style="margin: 40px 0 20px 0;">
        <div class="ui checkbox" name="Alert" value="television">
          <input type="checkbox" class="chkbox" name="Alert" value="television"  id="Alert">
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
