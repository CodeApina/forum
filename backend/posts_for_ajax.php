<?php
include "include_master.php";
$post = new post();
$posts = $post->get_all_posts();
echo json_encode($posts);