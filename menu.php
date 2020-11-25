<?php
    print'
    <a class="navbar-brand" href="#">NTPWS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="btn btn-outline-light mr-2 my-1" href="index.php?menu=1">Home</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-light mr-2 my-1" href="index.php?menu=2">Ships</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-light mr-2 my-1" href="index.php?menu=3">Contact</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-light mr-2 my-1" href="index.php?menu=4">About</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-light mr-2 my-1" href="index.php?menu=5">Gallery</a>
            </li>';
            if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
            }
            else if ($_SESSION['user']['valid'] == 'true') {
                if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2){
                    print'
                    <li>
                        <a class="btn btn-outline-success mr-2 my-1" href="index.php?menu=10&action=0">Articles</a>
                </li>';
                }
                else if ($_SESSION['user']['role'] == 3){
                print '
                <li>
                    <a class="btn btn-outline-success mr-2 my-1" href="index.php?menu=8&action=0">New article</a>
                </li>';                
                }
                print'
                <li>
                    <a class="btn btn-outline-primary mr-2 my-1" href="index.php?menu=9&action=1">Users</a>
                </li>';
            }
            print '
        </ul>
        <form class="form-inline mt-2 my-lg-0">';
        if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
            print '
            <a class="btn btn-warning mr-2 my-1" href="index.php?menu=6">SIGN IN</a>
            <a class="btn btn-danger" href="index.php?menu=7">SIGN UP</a>';
        }
        else if ($_SESSION['user']['valid'] == 'true') {
            print '
            <a class="btn btn-success my-1" href="signout.php">Log off</a>';
        }
        print'
        </form>        
    </div>';
?>