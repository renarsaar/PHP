<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Server Info</title>
</head>
<body>
    <?php
  # ---$_SERVER SUPERGLOBAL---
  # https://www.php.net/manual/en/reserved.variables.server.php

  # CREATE SERVER ARRAY 
  $server = [
    "Host Server Name" => $_SERVER["SERVER_NAME"],
    "Host Header" => $_SERVER["HTTP_HOST"],
    "Server Software" => $_SERVER["SERVER_SOFTWARE"],
    "Document Root" => $_SERVER["DOCUMENT_ROOT"],
    "Current Page" => $_SERVER["PHP_SELF"], 
    "Script Name" => $_SERVER["SCRIPT_NAME"], 
    "Absolute Path" => $_SERVER["SCRIPT_FILENAME"]
  ];

  # CREATE CLIENT ARRAY 
  $client = [
    "Client System Info" => $_SERVER["HTTP_USER_AGENT"],
    "Client IP" => $_SERVER["REMOTE_ADDR"],
    "Remote Port" => $_SERVER["REMOTE_PORT"]
  ];
?>
<pre>
  <?php print_r($server); ?>
</pre>

</body>
</html>