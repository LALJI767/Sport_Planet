<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $loggedin = true;
}
else{
    $loggedin = false;
}
echo '<body>
    <div class="header">
        <div class="container">
            <div class="header-grid">
                <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                    <ul>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a
                                href="mailto:lalji22@gmail.com">lalji22@gmail.com</a></li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+91 <span>72280</span>
                            40395
                        </li>';
                        // if (!$loggedin){
                        // echo '<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.php">Login</a>
                        // </li>';
                        // }
                        if($loggedin){
                        echo '<li><i class="glyphicon glyphicon-log-out" aria-hidden="true"></i><a
                                href="logout.php">Logout</a></li>';
                        }
                    echo '</ul>
                </div>';?>
                <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
                                    </div>
                <div class="clearfix"> </div>
            </div>
            <?php
            include 'menu.php';
            ?>
        </div>
    </div>