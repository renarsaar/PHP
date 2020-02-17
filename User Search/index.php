<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script>
    function showSuggestion(str) {
      // IF length 0 = make no requests
      if (str.length == 0) {
        document.getElementById("output").innerHTML = "";
      } else {
        // AJAX REQUEST
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "suggest.php?q="+str, true);
        xmlhttp.send();
      }
    }
  </script>
  <title>Search User</title>
</head>
<body>
  <div class="container">
    <h1>Search Users</h1>
    <form>
      Search User: <input type="text" class="form-control"
      onkeyup="showSuggestion(this.value)">
      <!-- Make the request every time written -->
    </form>
    <p>Suggestions<div class="" id="output" style="font-weight:bold"></div></p>
  </div>
</body>
</html>