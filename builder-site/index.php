<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CF - Builder Site</title>
    <script type="text/javascript">

        function receiveMessage(event)
        {
          window.history.pushState("unit-selector", "unit-selector", event.data); 
        }

        addEventListener("message", receiveMessage, false)

        function reloadIframe()
        {
            var anchor = document.location.hash;
            if(anchor=='')
            {
                var cfUrl ='http://test.cfunitselectortest.com/project/7';
            }
            else
            {
                var cfUrl ='http://test.cfunitselectortest.com/project/7'+anchor;
            }
            
            document.getElementById('iframe').src = cfUrl;             
        }
         addEventListener("load", reloadIframe, false) 

        </script>
     
  </head>
  <body >
      <div>
        <h1>Unit - Selector</h1>
        <br>
        <iframe id="iframe" width="1200" height="750" src=""></iframe>
      </div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
            $(window).bind( 'hashchange', function(e) { 
            reloadIframe()

            });
            
        });   

      </script>
</html>