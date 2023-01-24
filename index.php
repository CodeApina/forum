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
            <script>
                fetch("backend/posts_for_ajax.php").then(function(response){
                    return response.json();
                }).then(function(posts){
                    console.log(posts);
                    //posts.foreach(
                    //    <div class="card mb-4 bg-secondary text-light">
                    //        <div class="card-body justify-content-center">
                    //            <div class="d-flex justify-content-start">
                    //                <p class="medium mb-0 ms-0"><h5><?$row["title"]?></h5></p>
                    //            </div>
                    //            <div class="d-flex justify-content-start">
                    //                <p class="medium mb-0 ms-6"><?$row["content"]?></p>
                    //            </div>
                    //            <div class="d-flex justify-content-between">
                    //                <p class="small mb-0 ms-0"><?$row["user"]?></p>
                    //            </div>
                    //            <div class="d-flex flex-row align-items-center">
                    //                <p class="small text-muted mb-0">Upvote?</p>
                    //                <i class="far fa-thumbs-up mx-2 fa-xs text-white" style="margin-top: -0.16rem;"></i>
                    //                <p class="small text-muted mb-0"><?$row["likes"]?></p>
                    //            </div>
                    //        </div>
                    //    </div>
                    //)
                })
                document.write()
            </script>
            <!-- <div class="card mb-4 bg-secondary text-light">
                <div class="card-body justify-content-center"></div>
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
            </div> -->
        </div>
    </body>
</html>