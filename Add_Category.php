<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");  
    exit;
}
?>
<?php
    $showAlert = false;
    $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'Include/dbconnect.php';

    $c_category = $_POST["c_category"];
    $s_category = $_POST["s_category"];

    $existSql = "SELECT * FROM `add_category` WHERE s_category = '$s_category'";
    $result = mysqli_query($conn, $existSql);
    $numExistsRows = mysqli_num_rows($result);
    if ($numExistsRows > 0){
        $showError = "<script>alert('This recored is alredy exist')</script>";
    }
    else{
        $exists = false;
        if($s_category){
            $sql = "INSERT INTO `add_category` (`c_id`, `c_category`, `s_category`, `dateandtime`) VALUES (NULL, '$c_category', '$s_category', CURRENT_TIMESTAMP())";
            $result = mysqli_query($conn,$sql);

            if($result){
                $showAlert = true;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <?php
        require('Include/head.php')
    ?>

    <body>
        <?php 
        if($showAlert){
            echo "<script>alert('Category Insertion Success')</script>";
        }
        if($showError){
            echo "<script>alert('Category Insertion Failed')</script>$showError";
        }?>
    <!-- header -->
        <?php
            require ('Include/Header.php');
        ?>
    <!-- //header -->
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Add Categorys</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Add Categorys</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">If something stands between you and your success, move it. Never be denied.</p>
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <form action="#" method="POST" name="frm" enctype="multipart/form-data" onsubmit="return check(this)">
                    <?php
						include("Include/dbconnect.php");
						$qry = "SELECT * from `sport_planet`.`add_category`";
						$sql = mysqli_query($conn,$qry);	
		   
						//while($row=mysqli_fetch_array($sql))
						//{
						//}
					?>
                    <tr>
                    <label for="Choose Category">Choose Category</label>
                        <select onkeypress="return isNumber(event)" id="" name="c_category" required=" "
                            class="form-control">
                            <option selected>Choose...</option>
                            <option value="Indor game">Indor game</option>
                            <option value="Outdor game">Outdor game</option>
                        </select>
                    </tr>
                    <br><br>
                    <tr>
                        <td><b>Choose Sub Category</b></td>
                        <td><input type="text" maxlength="20" placeholder="Choose Sub Category" onkeypress="return isChar(event)" id="" name="s_category" required=" "></td>
                    </tr>
                    <input type="submit" value="Submit" name="Submit">
                </form>
            </div>
        </div>
    </div>
    <!-- //login -->
    <!-- footer -->
    <?php
            require ('Include/footer.php');
        ?>
    <!-- //footer -->
</body>
</html>