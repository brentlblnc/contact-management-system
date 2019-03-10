<?php
    session_start();
?>
<section class="hero is-info is-bold content">
    <div class="hero-body">
        <div class="container">
            <div class="navbar-menu">
                <div class="navbar-start">
                    <div class="navbar-item">
                        <div class="block">
                            <h1 class="title">Contact Manager</h1>
                            <h2 class="subtitle is-size-6">WEBD3000 Project I</h2>
                        </div>
                    </div>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="block">
                            <a href="<?php echo isset($_SESSION['authenticated']) ? 'logout.php' : 'views/login.php'?>" class="button is-link"><?php echo isset($_SESSION['authenticated']) ? 'Logout' : 'Login'?>&nbsp;<i class="fas fa-key"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>