<?php
include 'db.php';
?>




<!doctype html>
<html>
    <head>
  

        <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link  href="styles/styles.css" rel="stylesheet">

    
    </head>
    <body>
    <?php
include 'header.php';
 ?>
   

         <div class="sections-wraper">
         <div class="d-flex flex-column w-100">
        <?php

                    // pripremamo upit
                    $sql = "SELECT id, title, body, author, created_at  FROM posts ORDER BY created_at DESC LIMIT 3"; // order by date opadajuci
                    $statement = $connection->prepare($sql);

                    // izvrsavamo upit
                    $statement->execute();

                    // zelimo da se rezultat vrati kao asocijativni niz.
                    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                    $statement->setFetchMode(PDO::FETCH_ASSOC);

                    // punimo promenjivu sa rezultatom upita
                    $posts = $statement->fetchAll();

                    // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
                    //    echo '<pre>';
                    //    var_dump($posts);
                    //    echo '</pre>';



                    // iteriramo kroz niz post-ova


        foreach ($posts as $post) { ?>

        
            <article class="va-c-article display-inline post-section">
                <header>
                <h2 class="blog-post-title"><a href="single-post.php?id=<?php echo $post['id'] ?>"><?php echo $post['title']; ?></a></h2>
                <p class="blog-post-meta"><?php echo $post['created_at']; ?> by: <?php echo $post['author']; ?></a></p>
                    
                </header>

                <div>
                    <p><?php echo($post['body'])?></p>
            </div>
                <hr>
            </article>
        

            <?php } ?>
        </div>
        <?php
     include 'sidebar.php';
    ?>
    </div>
    </body>
</html>
<?php
include 'footer.php';
?>









