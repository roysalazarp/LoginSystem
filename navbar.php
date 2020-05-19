<?php

    require_once 'core/init.php';
    if(Session::exists('home')) {
        echo '<p>' . Session::flash('home') . '</p>';
    }
?>

<link rel="stylesheet" href="static/navbar-style.css">

<div class="grid">
    <nav class="navbarMenu">
        <div class="btn-dropDownMenu" onclick="toggleNavbar()"></div>
        <div class="navbar-container">
            <?php
            $user = new User();
            if ($user->isLoggedIn()) {
            ?>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="logout.php">Log out</a></li>
                    <li><a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a></li>
                </ul>
            <?php
                if ($user->hasPermission('admin')) {
                    echo '<p>You are an administrator.</p>';
                }
            } else {
                ?>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="register.php">register</a></li>
                    <li><a href="login.php">log in</a></li>
                </ul>
                <?php
            }
            ?>
        </div>
    </nav>

    <div class="dropDownMenu">
        <?php
        $user = new User();
        if ($user->isLoggedIn()) {
        ?>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="logout.php">Log out</a></li>
                <li><a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a></li>
            </ul>
        <?php
            if ($user->hasPermission('admin')) {
                echo '<p>You are an administrator.</p>';
            }
        } else {
            ?>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">register</a></li>
                <li><a href="login.php">log in</a></li>
            </ul>
            <?php
            }
        ?>
    </div>
</div>

<script src="mobileMenu.js"></script>
