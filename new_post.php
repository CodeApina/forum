<?php
include 'navbar.php';?>
<html data-bs-theme="dark">
    <head>
        <title>New post</title>
    </head>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <div class="mb-3 mt-3 text-center">
            <label for="new post">New post</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        </div>
        <div class="mb-3 mt-3 text-center">
            <textarea class="form-control" name="text" id="text" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3 mt-3 text-center">
            <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
    </form>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['title']) !== true)
        echo "Please add a title";
    else if (isset($_POST['text']) !== true)
        echo "Text box can't be empty";
    else{
        $function = new post();
        switch($functuon->post_handler($_POST['title'], $_POST['text'])){
            case 1 : {
                echo "Post created";
                break;
            }
            case 0 :
                echo "Error, post was not created";
                break;
        }
    }
}