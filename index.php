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
        <div id="post">
            <div class="card mb-4 bg-secondary text-light">
                <div class="card-body justify-content-center">
                    <div class="d-flex justify-content-start">
                        <p id="title_box" class="medium mb-0 ms-0"><h5><?$row["title"]?></h5></p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <p id="content_box" class="medium mb-0 ms-6"><?$row["content"]?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p id="user_box" class="small mb-0 ms-0"><?$row["user"]?></p>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <p class="small text-muted mb-0">Upvote?</p>
                        <i class="far fa-thumbs-up mx-2 fa-xs text-white" style="margin-top: -0.16rem;"></i>
                        <p id="likes_box" class="small text-muted mb-0"><?$row["likes"]?></p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            
            fetch("backend/posts_for_ajax.php").then(function(response){
                    return response.json();
                }).then(function(posts){
                    var html = '';
                    posts.forEach((post)=>{
                        html += '<div class="card mb-4 bg-secondary text-light">' +
                                    '<div class="card-body justify-content-center">' +
                                        '<div class="d-flex justify-content-start">' +
                                            '<p id="title_box" class="medium mb-0 ms-0"><h5>' + post.title + '</h5></p>' +
                                        '</div>' + 
                                        '<div class="d-flex justify-content-start">' +
                                            '<p id="content_box" class="medium mb-0 ms-6">' + post.content +'</p>' +
                                        '</div>' +
                                        '<div class="d-flex justify-content-between">' +
                                            '<p id="user_box" class="small mb-0 ms-0">' + post.user + '</p>' +
                                        '</div>' + 
                                        '<div class="d-flex flex-row align-items-center">' +
                                            '<p class="small text-muted mb-0">Upvote?</p>' +
                                            '<i class="far fa-thumbs-up mx-2 fa-xs text-white" style="margin-top: -0.16rem;"></i>' +
                                            '<p id="likes_box" class="small text-muted mb-0">' + post.likes + '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>'
                    });

                    cont = document.getElementById('post').innerHTML = html;
                });
            function show_post(post) {

            }
            </script>
    </body>
</html>