<?php
include 'backend/bootstrap.php';
include 'backend/include_master.php';
if (!isset($_SESSION["cookies_allowed"]))
    $_SESSION["cookies_allowed"] = false;
?>
<html>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php">FAQ</a>
                    </li>
                    <?php
                    switch (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                        case true :?>
                            <li class="nav-item">
                                <a class="nav-link" href="new_post.php">Post</a>
                            </li>
                            <?php
                            break;
                        default : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="new_post.php">Post</a>
                            </li>
                            <?php
                            break;
                        }?>
                </ul>  <?php
                    switch (isset($_SESSION['logged_in']) || isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] !== ""){
                        case true;
                            switch($_SESSION['logged_in']){
                                case true:?>
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item dropdown me-auto">
                                            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['username']?></button>
                                            <div class="dropdown-menu dropdown-meny-end dropdown-menu-dark">
                                                <a class="dropdown-item" href="log_out.php">Log out</a>
                                            </div>
                                        </li>
                                    </ul>
                                    <?php
                                    break;
                                case false:?>
                                    <ul class="navbar-nav ml-auto">
                                        <span>
                                            <li class="nav-item dropdown me-auto">
                                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">Guest</button>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                                    <a class="dropdown-item" href="log_in.php">Log in</a>
                                                    <a class="dropdown-item" href="register.php">Register</a>
                                                </div>
                                            </li>
                                        </span>
                                    </ul>
                                    <?php 
                                    break;
                                default: ?>
                                    <ul class="navbar-nav ml-auto">
                                        <span>
                                            <li class="nav-item dropdown me-auto">
                                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">Guest</button>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                                    <a class="dropdown-item" href="log_in.php">Log in</a>
                                                    <a class="dropdown-item" href="register.php">Register</a>
                                                </div>
                                            </li>
                                        </span>
                                    </ul><?php
                                }
                            break;
                        case false:{?>
                            <ul class="navbar-nav ml-auto">
                                <span>
                                    <li class="nav-item dropdown me-auto">
                                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">Guest</button>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                            <a class="dropdown-item" href="log_in.php">Log in</a>
                                            <a class="dropdown-item" href="register.php">Register</a>
                                        </div>
                                    </li>
                                </span>
                            </ul>
                            <?php
                            break;
                        }
                        default:{?>
                            <ul class="navbar-nav ml-auto">
                                <span>
                                    <li class="nav-item dropdown me-auto">
                                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">Guest</button>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                            <a class="dropdown-item" href="log_in.php">Log in</a>
                                            <a class="dropdown-item" href="register.php">Register</a>
                                        </div>
                                    </li>
                                </span>
                            </ul>
                        <?php
                            break;
                        }
                    }?>
                </ul>
            </div>
        </nav>
        <?php 
        switch (isset($_SESSION['cookies_allowed'])){
            case false:{?>
                <div class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-title">
                                <h5 class="modal-title">Allow cookies?</h5>
                            </div>
                            <div class="modal-body">
                                <p>Allow cookies?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="button-primary" id="yes_cookie">Yes</button>
                                <button type="button" class="button-secondary" data-dismiss="modal" id="no_cookie">Close</button>
                                <script>

                                    var yes_cookies_button = document.getElementById("yes_cookie");
                                    var no_cookies_button = document.getElementById("no_cookie");

                                    yes_cookies_button.onclick = function(){
                                        <?php $_SESSION['cookies_allowed'] = true ?>
                                    }
                                    no_cookies_button.onclick = function(){
                                        <?php $_SESSION['cookies_allowed'] = false ?>
                                    }

                                </script>
                            </div>
                        </div> 
                    </div>
                </div>
        <?php 
                break;
            }
            case true:{

            }
        }?>
</html>
