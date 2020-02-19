<?php
  require ("inc/config.php");
  require ("inc/db.php");

  # Check for submit
  if (isset($_POST["submit"])) {
    # Get form data
    $update_id = mysqli_real_escape_string($conn, $_POST["update_id"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $body = mysqli_real_escape_string($conn, $_POST["body"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);

    $query = "UPDATE posts SET title='$title', body='$body', author='$author' WHERE id = '{$update_id}' ";

    if (mysqli_query($conn, $query)) {
      header ("Location: ".ROOT_URL);
    } else {
      echo "ERROR: ".mysqli_error($conn);
    }
  }
// die($query); to dispaly error
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
    <h1>Edit Post</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $post["title"]; ?>">
      </div>
      <div class="form-group">
        <label for="title">Author</label>
        <input type="text" name="author" class="form-control" value="<?php echo $post["author"]; ?>">
      </div>
      <div class="form-group">
        <label for="title">Body</label> <br>
        <textarea name="body" class="form-control"><?php echo $post["body"]; ?></textarea>
      </div>
        <input type="hidden" name="update_id" value="<?php echo $post["id"]; ?>">
        <input type="submit" name="submit" value="Edit" class="btn btn-primary">
    </form>
  </div>
<?php include("inc/footer.php"); ?>