<html>
<?php
include 'backend/cookie.php';
include 'backend/error.php'; 
include 'backend/session.php'; ?>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="navbar-nav">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="navbar-nav">
                        <a class="nav-link" href="faq.php">FAQ</a>
                    </li>
                    <li class="navbar-nav">
                        <a class="nav-link" href="log_out.php">Log out</a>
                    </li>
                    <li class="navbar-nav">
                        <a class="nav-link" href="new_post.php">Post</a>
                    </li>
                    <?php  
                    switch (isset($_SESSION['logged_in'])){
                        case true;
                            switch($_SESSION['logged_in']){
                                case true:?>
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item dropdown me-auto">
                                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"><?php $_SESSION['username']?></a>
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
                                                    <a class="dropdown-item" href="login.php">Log in</a>
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
                                                    <a class="dropdown-item" href="login.php">Log in</a>
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
                                            <a class="dropdown-item" href="login.php">Log in</a>
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
</html>