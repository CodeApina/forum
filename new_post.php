<?php
include 'navbar.php';?>
<html>
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