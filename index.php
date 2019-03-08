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
   
    <script type="text/javascript">
    var accessToken = "fb91d8987c274d568c656e7f4c71e000";
    var baseUrl = "https://api.dialogflow.com/v1/";
    $(document).ready(function() {
      $("#input").keypress(function(event) {
        if (event.which == 13)
        {
          console.log("++event.which==13 WORKING");
          event.preventDefault();
          send();
          this.value = '';
        }
      });
      $("#rec").click(function(event) 
      {
        switchRecognition();
        console.log("++SwitchRecognition() fired");  
      });
    });
    var recognition;
    function startRecognition() {
      console.log("++inside startRecognition()");    
      recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition ||
      window.msSpeechRecognition)();
      recognition.onstart = function(event) {
        updateRec();
      };
      recognition.onresult = function(event) {
        var text = "";
          for (var i = event.resultIndex; i < event.results.length; ++i) {
            text += event.results[i][0].transcript;
          }
          setInput(text);
        stopRecognition();
      };
      recognition.onend = function() {
        stopRecognition();
      };
      recognition.lang = "en-US";
      recognition.start();
    }
  
    function stopRecognition() {
      if (recognition) {
        recognition.stop();
        console.log("++RecognitionStopped");  
        recognition = null;
      }
      updateRec();
    }
    function switchRecognition() {
      if (recognition) {
        stopRecognition();
      } else {
        startRecognition();
      }
    }
    function setInput(text) {
      $("#input").val(text);
      send();
    }
    function updateRec() {
      $("#rec").text(recognition ? "Stop" : "Speak");
    }
    function send() {
     console.log("++insideSend()_Function"); 
           
            var text = $("#input").val();
            console.log("++ValueofText==>"+text); 
            conversation.push("Me: " + text + '\r\n');
      $.ajax({
        console.log("++insideAjaxCode");   
        type: "POST",
        console.log("++lineBefore_baseUrl");   
        url: baseUrl + "query?v=20150910",
        console.log("++lineAfter_baseUrl");  
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        console.log("++lineBefore_headers");  
        headers: {
          console.log("++lineBefore_Authorization"); 
          "Authorization": "Bearer " + accessToken
          console.log("++Authorization_Done"); 
        },
        data: JSON.stringify({ query: text, lang: "en", sessionId: "somerandomthing" }),
        success: function(data) 
                {
                  console.log("++Success");   
                  var respText = data.result.fulfillment.speech;
                  console.log("Respuesta: " + respText);
                  setResponse(respText);
                  responsiveVoice.speak(respText,"Hindi Female");
                  $("#response").scrollTop($("#response").height());
        },
        error: function() {
          console.log("++Error");  
          setResponse("Internal Server Error");
        }
      });
      //setResponse("Thinking...");
    }
    function setResponse(val) {
            conversation.push("AI: " + val + '\r\n');
      $("#response").text(conversation.join(""));
    }
    var conversation = [];
    </script>

  
    <style>
  /* Add styles to the form container */
    .form-container {
      background-image: url("images/SoftBlack.png");
      max-width: 400px;
      height: 600px;
      padding: 10px;
      background-color: #EAE2E2;
    }   
  </style>
 <script type="text/javascript">
    /* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
    (function(d, m){
      var kommunicateSettings = {"appId":"16c3efad7b70ff3519d6431f6865e7e50","conversationTitle":"GILabs ","onInit": function() {
        var iframeStyle = document.createElement('style');
                    var classSettings = ".change-kommunicate-iframe-height{height:70px!important;width:70px!important;}";
                    iframeStyle.type = 'text/css';
                    iframeStyle.innerHTML = classSettings;
                    document.getElementsByTagName('head')[0].appendChild(iframeStyle);

                    var launcherIconStyle = ".mck-sidebox-launcher,.km-chat-icon-sidebox{height: 100%;width: 100%;box-shadow: none;border-radius: 10px;}#launcher-svg-container {background: #FFD700!important;}.km-custom-launcher-image-ifr{height:89%!important;}.mck-sidebox-launcher{right:0!important;bottom:0!important;}";
                    Kommunicate.customizeWidgetCss(launcherIconStyle);

                    var addClassToIframe = parent.document.getElementById("kommunicate-widget-iframe");
                    addClassToIframe.classList.add("change-kommunicate-iframe-height");  

                    KommunicateGlobal.document.getElementById('mck-sidebox-launcher').addEventListener('click',function(){
                    var iframeClick = parent.document.getElementById("kommunicate-widget-iframe");
                    iframeClick.classList.remove("change-kommunicate-iframe-height");
                    });

                    KommunicateGlobal.document.getElementById('km-chat-widget-close-button').addEventListener('click',function(){
                    var closeButtonClick = parent.document.getElementById("kommunicate-widget-iframe");
                    closeButtonClick.classList.add("change-kommunicate-iframe-height");
                    });
      }};
      var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
      s.src = "https://api.kommunicate.io/v2/kommunicate.app";
      var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
      window.kommunicate = m; m._globals = kommunicateSettings;
    })(document, window.kommunicate || {});
</script>
</head>
<body>
<section>
  <div>
    <img src="images/GILabs_logo.png" alt="G.I Labs" class="topleft">
  </div>
    <h1>Welcome to the world of AI</h1>
  <button class="open-button" onclick="openForm()"><b>AI Chatbot</b></button>

  <div class="chat-popup" id="myForm">
    
    <div class="form-container">
      <h1>AI CHATBOT</h1>
      <textarea id="response"></textarea>
      <label for="msg"><input id="input" class="input" placeholder="Type message.." type="text"></label>
      <button id="rec"><i class="fa fa-microphone">Talk</i></button>
      
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
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
