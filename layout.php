<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Dank Scrum</title>
    <link type="text/css" rel="stylesheet" href="#">
    <script type="text/javascript">
      //Ajax Stuff
      function showDashboard(str) {
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        }
        else {
          xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('wrapper').innerHTML = xmlhttp.responseText;
          }
        };
        xmlhttp.open('GET','dashboard.php?q='+str,true);
				xmlhttp.send();
      }
    </script>
  </head>
  <body>
    <div id="wrapper">
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  </body>
</html>
