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
      <form class="" action="process.php" method="post">
        <p>
          <label for="title">Title :</label>
          <input id="title" type="text" name="title">
        </p>
        <p>
          <label for="author">Author :</label>
          <input id="author" type="text" name="author">
        </p>
        <p>
          <label for="description">Description :</label>
          <textarea id="description" name="description" rows="8" cols="80"></textarea>
        </p>
        <p>
          <input type="submit" value="Send">
        </p>
      </form>
    </article>
    <input type="button" name="name" value="White" onclick="document.getElementById('body').className='white'">
    <input type="button" name="name" value="Black" onclick="document.getElementById('body').className='black'">
    <input type="button" name="name" value="Write" onclick="location.href='write.php'">

  </div>
  </body>
</html>
