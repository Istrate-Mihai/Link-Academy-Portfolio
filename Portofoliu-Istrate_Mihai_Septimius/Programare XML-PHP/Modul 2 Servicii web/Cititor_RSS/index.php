<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RSS Assignment</title>
  <link rel="stylesheet" type="text/css" href="styleRSS-Reader.css">
</head>

<body>
  <?php
  $rss_Content = file_get_contents('feedSource.rss');
  $rss_Feed = new SimpleXMLElement($rss_Content);
  echo '<form>';
  echo '<label style="text-align:center;">Selectati un continut RSS:</label><br><br>';
  echo '<select onchange="parseRSS(this)">';
  echo '<option>Select Link</option>';
  foreach ($rss_Feed->channel->item as $address) {
    echo '<option>' . $address->title . '</option>';
  }
  echo '</select>';
  echo '</form>';
  ?>
  <div id="result"></div>
  <script>
    var resultShown = document.getElementById("result");

    function xhttpFunction() {
      var xhttp;
      try {
        xhttp = new XMLHttpRequest();
      } catch (e) {
        try {
          xhttp = new ActiveXObject("MSXML2.XMLHTTP");
        } catch (e) {
          try {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
          } catch (e) {
            alert("Your browser broke!");
            return false;
          }
        }
      }
      return xhttp;
    }

    function parseRSS(content_chosen = "") {
      var conn = xhttpFunction();
      conn.onreadystatechange = function() {
        if (conn.readyState == 4 && conn.status == 200) {
          var response = conn.responseXML;
          var items = response.getElementsByTagName("channel")[0].getElementsByTagName("item");
          var result = "<p>";
          for (i = 0; i < items.length; i++) {
            var searchedValue = items[i].getElementsByTagName("title")[0].firstChild.nodeValue;
            if (content_chosen.value == searchedValue) {
              var response_Title = items[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
              var response_Description = items[i].getElementsByTagName("description")[0].childNodes[0].nodeValue;
              var url = items[i].getElementsByTagName("link")[0].childNodes[0].nodeValue;
              result += "<h2><a href=\"" + url + "\">" + response_Title + "</a></h2>" + "<br><br>" + response_Description;
            }
          }
          result += "</p>";
          resultShown.innerHTML = result;
        }
      }
      conn.open("GET", "feedSource.rss", true)
      conn.send(null);
    }
  </script>
  <noscript>Enable javasscript in your browser for the selection to work!</noscript>
</body>

</html>