<?php include 'navbar.php'; ?>
<html data-bs-theme="dark">
    <head>
        <title>Sign up</title>
    </head>
    <body>
        <form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>">
            <div class="mb-3 mt-3 container-fluid">
                <label for="email" class="form-label">Email:</label>
                <br>
                <input type="email" class="form_control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3 container-fluid">
                <label for="username" class="form_label">Username:</label>
                <br>
                <input type="username" class="form_control" id="username" placeholder="Enter username" name="username">
            </div>
            <div class="mb-3 container-fluid">
                <label for="password" class="form_label">Password:</label>
                <br>
                <input type="password" class="form_control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="container-fluid">
                <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
        </form>
    </body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['email']) !== true){
        echo 'Email required';
    }
    else if (isset($_POST['password']) !== true){
        echo 'Password required';
    }
    else if (isset($_POST['username']) !== true)
        echo 'Username required';
    else {
        $function = new register_functions();
        switch($function->register_handler($_POST['email'], $_POST['username'], $_POST['password'])){
            case 0 :
                echo "Error: Sign up failed";
                break;
            case 1 :{
                header('Location:index.php');
                echo "Registration complete";
            }
            break;
            case 2 :
                echo "Username or email already taken";
                break;
        }
    }
}