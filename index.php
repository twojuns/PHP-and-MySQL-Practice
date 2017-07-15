<?php
  require_once('conn.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body id="body">
    <header>
      <h1><a href="index.php">Title</a></h1>
    </header>
    <nav>
      <ol>
<?php
$sql = "SELECT*FROM `topic`";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
}
?>
      </ol>
    </nav>
  <div id="content">
    <article>
<?php
if (empty($_GET['id'])) {
}
else {
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$id;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
?>
  <h2><?=htmlspecialchars($row['title'])?></h2>
  <div><?=htmlspecialchars($row['description'])?></div>
  <div><?=htmlspecialchars($row['created'])?> | <?=htmlspecialchars($row['name'])?></div>
<?php
}
?>
    </article>

<?php
    if(isset($_POST['delete'])){
       $id = $_POST['delete_rec_id'];
       $sql = "DELETE FROM topic WHERE id=$id";
       $result = mysqli_query($conn, $sql);
    }
?>

      <input type="button" name="name" value="Write" onclick="location.href='write.php'">
      <form style="display: inline-block" id="delete" method="post" action="">
        <input type="hidden" name="delete_rec_id" value="<?php print $id; ?>"/>
        <input type="submit" name="delete" value="Delete">
        <input type="button" name="delete" value="Home Page" onclick="location.href='index.php'">
      </form>

  </div>
  </body>
</html>
