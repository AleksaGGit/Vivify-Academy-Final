<?php

    include('db.php');
?>
 
 <head>



<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../../../favicon.ico">


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
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "select * from posts where id = '{$id}'";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $post = $statement->fetch(PDO::FETCH_ASSOC);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $author = $_POST['author'];
            $text = $_POST['text'];
            $sql = "insert into comments (author, text, post_id) values ('{$author}', '{$text}', '{$id}')";
            $statement = $connection->prepare($sql);
            $statement->execute();
        }


?><h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
<p class="blog-post-meta"><?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></a></p>



        <p><?php echo $post['body']; ?></p>

        
        <div class="create-comment">
            <h2 class="margins-top-bottom">Create comment</h2>

            <form action="single-post.php?id=<?php echo $id ?>" method="POST">


                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required><p></p>

                <label for="text">Comment:</label>
                <input class="margins-top-bottom" id="text" name="text" required>


                <input class="btn btn-danger" type="submit" value="Add comment">

            </form>
        </div>


<?php 
include('comments.php');
include('footer.php');
 ?>
</body>
