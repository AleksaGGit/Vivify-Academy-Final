<? include('db.php'); ?>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="styles/blog.css" rel="stylesheet">
        <link rel="stylesheet" href="styles/styles.css">

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from comments where post_id = '{$id}' ";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>
    <body>
        <h1>Comments</h1>
        <?php foreach ($comments as $comment) { ?>
            <div>
                <ul>
                    <li>
                        <h3><?php echo $comment['author']; ?></h3>
                        <p><?php echo $comment['text']; ?></p>
                    </li>
                    <hr>
                </ul>
            </div>
        <?php }; ?>
    </body>

