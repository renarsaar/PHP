<?php
  require ("inc/config.php");
  require ("inc/db.php");

# USING PROCEDUAL MSQLi

  # Create query = Newer first
  $query = "SELECT * FROM posts ORDER BY created_at DESC";

  # Get the result
  $result = mysqli_query($conn, $query);

  # Fetch data
  # ASSOCIATIVE ARRAY = ["name" => "renar"]
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

  # Free result
  mysqli_free_result($result);

  # Close connection
  mysqli_close($conn);

?>

<?php include("inc/header.php"); ?>
  <div class="container">
    <h1>Posts</h1>
    <!-- Loop through posts with foreach loop -->
    <?php foreach($posts as $post) : ?>
      <div class="well">
        <h3><?php echo $post["title"]; ?></h3>
        <h5>Created At: <?php echo $post["created_at"]; ?> By: <?php echo $post["author"]; ?></h5>
        <p><?php echo $post["body"]; ?></p>
        <a class="btn btn-default" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post["id"]; ?>">Read more</a>
      </div>
    <?php endforeach; ?>
  </div>
<?php include("inc/footer.php"); ?>