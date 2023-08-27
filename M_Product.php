<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");  
    exit;
}?>
<?php
    $showAlert = false;
    $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'Include/dbconnect.php';

    $id = $_POST["id"];
    $p_name = $_POST["p_name"];
    $c_category = $_POST["c_category"];
    $p_price = $_POST["p_price"];
    $discount = $_POST["discount"];
    $o_price = $_POST["o_price"];
    $highlight = $_POST["highlight"];
    $discription = $_POST["discription"];
    $s_category = $_POST["s_category"];
    $upload_picture = $_FILES['upload_picture']['name'];

    $existSql = "SELECT * FROM `add_products` WHERE p_name = '$p_name' AND upload_picture = '$upload_picture'";
    $result = mysqli_query($conn, $existSql);
    $numExistsRows = mysqli_num_rows($result);
    if ($numExistsRows > 0){
        $showError = "<script>alert('This recored is alredy exist')</script>";
    }
    else{
        $exists = false;
        if($p_name){
            $sql = "INSERT INTO `add_products` (`id`,`p_name`, `c_category`, `p_price`, `discount`, `o_price`, `highlight`, `discription`, `upload_picture`, `dateandtime`,`s_category`) VALUES ('$id', '$p_name', '$c_category', '$p_price', '$discount', '$o_price', '$highlight', '$discription', '$upload_picture', CURRENT_TIMESTAMP(),'$s_category')";
            $result = mysqli_query($conn,$sql);
            move_uploaded_file($_FILES['upload_picture']['tmp_name'],"Products_images/".$_FILES['upload_picture']['name']);

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
            echo "<script>alert('Recored Insertion Success')</script>";
        }
        if($showError){
            echo "<script>alert('Recored Insertion Failed')</script>$showError";
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
                <li class="active">Add Products</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Add Products</h3>
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
                        <td><b>ID :</b></td>
                        <td><input type="text" placeholder="Id" onkeypress="return isNumber(event)" id="" name="id" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Product Name :</b></td>
                        <td><input type="text" placeholder="Product Name" onkeypress="return isNumber(event)" id="" name="p_name" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <label for="category name">Choose Category :</label>
                        <select name="c_category">
                            <option value="Indor game"></option>
                            <option value="Indor game">Indor game</option>
                            <option value="Outdor game">Outdor game</option>
                        </select>
                    </tr>
                    <br><br>
                    <tr>
                        <td><b>Choose Sub Category :</b></td>
                        <td><input type="text" placeholder="Choose Sub Category" onkeypress="return isNumber(event)" id="" name="s_category" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Product Price :</b></td>
                        <td><input type="text" placeholder="Product Price" onkeypress="return isNumber(event)" id="" name="p_price" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Discount :</b></td>
                        <td><input type="text" placeholder="Discount" id="" onkeypress="return isNumber(event)" name="discount" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Original Price:</b></td>
                        <td><input type="text" placeholder="Original Price" onkeypress="return isNumber(event)" id="" name="o_price" required=" ">
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Highlight :</b></td>
                        <td><input type="text" placeholder="highlight" onkeypress="return isNumber(event)" id="" name="highlight" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Discription:</b></td>
                        <td><input type="text" placeholder="Discription" onkeypress="return isNumber(event)" id="" name="discription" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Upload Picture :</b></td>
                        <td><input type="file" placeholder="" onkeypress="return isNumber(event)" id="" name="upload_picture" required=" "></td>
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