<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $loggedin = true;
}
else{
    $loggedin = false;
}
echo '<div class="logo-nav">
    <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
        <h1><a href="Home.php">Sport Planet<span>Shop anywhere</span></a></h1>
    </div>
    <div class="logo-nav-left1">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                    data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>';
            if ($loggedin){
                echo '<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav" style="margin: 0 -130px">
                    <li class="active"><a href="Home.php" class="act">Home</a></li>
                    <!-- Mega Menu -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Category<b
                                class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="multi-gd-img">
                                    <ul class="multi-column-dropdown" style="margin: -31px 0;">
                                        <li><a href="Add_Category.php">Add Category</a></li>
                                        <li><a href="View_Category.php">View Category</a></li>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li><a href="M_Users.php">Manage Users</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Product<b
                                class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="multi-gd-img">
                                    <ul class="multi-column-dropdown" style="margin: -31px 0;">
                                        <li><a href="Add_Product.php">Add Product</a></li>
                                        <li><a href="View_product.php">View product</a></li>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li><a href="M_OrderList.php">Manage Order List</a></li>
                    <li><a href="M_Join_Mail.php">Manage Join Mails</a></li>
                    <li><a href="M_Mail.php">Manage Mail</a></li>
                    <li><a href="M_Reviews.php">Manage Reviews</a></li>
                    <li><a href="Report.php">Report</a></li>
                </ul>';}?>
            </div>
        </nav>
    </div>
    <div class="logo-nav-right">
        <div class="search-box">
            <div id="sb-search" class="sb-search">
                <form>
                    <input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
                    <input class="sb-search-submit" type="submit" value="">
                    <span class="sb-icon-search"> </span>
                </form>
            </div>
        </div>
        <!-- search-scripts -->
        <script src="js/classie.js"></script>
        <script src="js/uisearch.js"></script>
        <script>
            new UISearch(document.getElementById('sb-search'));
        </script>
        <!-- //search-scripts -->
    </div>
</div>