
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta id="apple-mobile-web-app-capable" name="apple-mobile-web-app-capable" content="yes" > 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="G.I Labs">
    <meta name="author" content="GIL">

    <title>iVAC</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
   
    <script type="text/javascript" src="js/conversation.js"></script>


</head>
<body>
<section>
  <div>
    <img src="css/images/GILabs_logo.png" alt="G.I Labs" class="topleft">
  </div>
    <h1 class="quote">Welcome to the world of AI</h1>
  <button class="open-button" onclick="openForm()">Have any query? <b>Ask AI Bot.</b></button>

  <div class="chat-popup" id="myForm">
    
    <div class="form-container">
      <h1>AI CHATBOT</h1>
      <div id="response" class="response"></div>
      <input id="input" class="input" placeholder="Type message.." type="text">
      <button id="rec"><b class="fa fa-microphone">Voice</b></button>
      
      <button type="button" class="btn cancel" onclick="closeForm()"><b>Close</b></button>
    </div>
  </div>
</section>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>
</html>
