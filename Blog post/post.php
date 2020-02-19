<?php
  require ("inc/config.php");
  require ("inc/db.php");

   # Check for submit
   if (isset($_POST["delete"])) {
    # Get form data
    $delete_id = mysqli_real_escape_string($conn, $_POST["delete_id"]);

    # Delete = delete_id (line 48)
    $query = "DELETE FROM posts WHERE id = {$delete_id};";

    if (mysqli_query($conn, $query)) {
      header ("Location: ".ROOT_URL);
    } else {
      echo "ERROR: ".mysqli_error($conn);
    }
  }

  # Get ID
  $id = mysqli_real_escape_string($conn, $_GET["id"]);

  # Create query
  $query = "SELECT * FROM posts WHERE id = $id";

  # Get the result
  $result = mysqli_query($conn, $query);

  # Fetch data
  # ASSOCIATIVE ARRAY = ["name" => "renar"]
  $post = mysqli_fetch_assoc($result);

  # Free result
  mysqli_free_result($result);

  # Close connection
  mysqli_close($conn);

?>

<?php include("inc/header.php"); ?>
  <div class="container">
      <h1><?php echo $post["title"]; ?></h1>
      <h5>Created At: <?php echo $post["created_at"]; ?> By: <?php echo $post["author"]; ?></h5>
      <p><?php echo $post["body"]; ?></p>

      <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="float-right">
      <!-- Hidden id shows this post ID -->
        <input type="hidden" name="delete_id" value="<?php echo $post["id"]; ?>">
        <input type="submit" name="delete" value="delete" class="btn btn-danger">
      </form>

      <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post["id"]; ?>" class="btn btn-default">Edit Post</a>
      <hr>
      <a class="btn btn-default" href="<?php echo ROOT_URL; ?>">Go Back</a>
  </div>
<?php include("inc/footer.php"); ?>