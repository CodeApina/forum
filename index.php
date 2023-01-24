<!DOCTYPE html>
<?php
if ( isset($_COOKIE["user_id"])){
    
}
include 'navbar.php';?>
<html data-bs-theme="dark">

    <head>
    
        <title>Forum</title>
    </head>
    <body>
        <div>
            
            <?php
            include "backend/classes/post.php";
            $post = new post();
            $posts = $post->get_all_posts();
            foreach ($posts as $current_post){
                ?>
                <div class="card mb-4 bg-secondary text-light">
                    <div class="card-body justify-content-center">
                        <div class="d-flex justify-content-start">
                            <p class="medium mb-0 ms-0"><h5><?$row["title"]?></h5></p>
                        </div>
                        <div class="d-flex justify-content-start">
                            <p class="medium mb-0 ms-6"><?$row["content"]?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small mb-0 ms-0"><?$row["user"]?></p>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <p class="small text-muted mb-0">Upvote?</p>
                            <i class="far fa-thumbs-up mx-2 fa-xs text-white" style="margin-top: -0.16rem;"></i>
                            <p class="small text-muted mb-0"><?$row["likes"]?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </body>
</html>