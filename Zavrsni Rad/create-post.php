<?php 
include('db.php'); 
?>
  <head>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">

    </head>
<body>
<?php 
include('header.php'); ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author = $_POST['author'];
    $sql = "insert into posts ( title, body,author,created_at) values ( '{$title}', '{$body}', '{$author}', curdate())";
    $statement = $connection->prepare($sql);
    $statement->execute();
    header("Location: index.php");
}
?>
<div class="create-post">
    <h2 class="create-new-post">Create new post</h2>
    <form action="create-post.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><p></p>
        <label for="body">Post:</label>
        <input id="body" name="body" required><p></p>
        <label for="author">Author:</label>
        <input id="author" name="author" required>
        <input class="btn btn-danger" type="submit" value="Create post">
    </form>
</div>
<?php include('footer.php'); ?>
</body>

