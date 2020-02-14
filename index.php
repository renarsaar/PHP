<?php include "server_info.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>System Info</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1 class="text-center py-3">Server & File Info</h1>
      <ul class="list-group">
        <?php foreach ($server as $list => $value): ?> 
          <li class="list-group-item">
           <strong><?php echo "$list: "?></strong>
           <?php echo $value?>
          </li> 
        <?php endforeach?>
      </ul>
      <h1 class="text-center py-3">Client Info</h1>
      <ul class="list-group">
        <?php foreach ($client as $list => $value): ?> 
          <li class="list-group-item">
           <strong><?php echo "$list: "?></strong>
           <?php echo $value?>
          </li> 
        <?php endforeach?>
      </ul>
  </div>
  <div class="py-4"></div>
</body>
</html>