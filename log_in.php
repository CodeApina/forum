<?php include 'navbar.php'; ?>
<!doctype html>
<html data-bs-theme="dark">
    
    <head>
        <title>Log in</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3 mt-3 container-fluid">
                <label for="email" class="form-label">Email:</label>
                <br>
                <input type="email" class="form_control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3 container-fluid">
                <label for="password" class="form_label">Password:</label>
                <br>
                <input type="password" class="form_control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="container-fluid form-check mb-3">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">Keep me logged in</label>
            <div class="container-fluid">
                <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
        </form>
    </body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['email']) !== true){
        echo '<div class="alert alert-danger"> "Email required"</div>';
    }
    else if (isset($_POST['password']) !== true){
        echo '<div class="alert alert-danger"> "Password required"</div>';
    }
    else if (isset($_POST['remember']) !== true)
        $_POST['remember'] = false;
    else {
        include "backend/log_in_handler.php";
        if (log_in_handler($_POST['email'], $_POST['password'], $_POST['remember']) === 0){
            header('Location:index.php');
        }
        else
            echo "'<div class='alert alert-danger'> 'Error: Log in failed'</div>";
    }
}