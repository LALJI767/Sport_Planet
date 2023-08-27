<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");  
    exit;
}
?>
<script language="javascript">
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Please Enter Only  Number");
            return false;
        }
    }
</script>
<?php
    $showAlert = false;
    $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'Include/dbconnect.php';

    $p_name = $_POST["p_name"];
    $c_category = $_POST["c_category"];
    $s_category = $_POST["s_category"];
    $p_price = $_POST["p_price"];
    $discount = $_POST["discount"];
    $o_price = $_POST["o_price"];
    $highlight = $_POST["highlight"];
    $discription = $_POST["discription"];
    $upload_picture = $_FILES['upload_picture']['name'];

    $existSql = "SELECT * FROM `add_products` WHERE p_name = '$p_name'";
    $result = mysqli_query($conn, $existSql);
    $numExistsRows = mysqli_num_rows($result);
    if ($numExistsRows > 0){
        $showError = "<script>alert('This recored is alredy exist')</script>";
    }
    else{
        $exists = false;
        if($p_name){
            $sql = "INSERT INTO `add_products` (`p_id`,`p_name`, `c_category`,`s_category`, `p_price`, `discount`, `o_price`, `highlight`, `discription`, `upload_picture`, `dateandtime`) VALUES (NULL, '$p_name', '$c_category','$s_category', '$p_price', '$discount', '$o_price', '$highlight', '$discription', '$upload_picture', CURRENT_TIMESTAMP())";
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
            <div class="login-form-grids animated wow slideInUp" style="width: 75vw;" data-wow-delay=".5s">
                <form action="#" method="POST" name="frm" enctype="multipart/form-data" onsubmit="return check(this)">
                    <tr>
                        <td><b>Product Name</b></td>
                        <td><input type="text" maxlength="100" placeholder="Product Name"
                                onkeypress="return isChar(event)" id="" name="p_name" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <label for="Choose Category">Choose Category</label>
                        <select id="" name="c_category" required=" "
                            class="form-control">
                            <option selected>Choose...</option>
                            <option value="Indor game">Indor game</option>
                            <option value="Outdor game">Outdor game</option>
                        </select>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Enter Sub Category</b></td>
                        <td><input type="text" maxlength="20" placeholder="Choose Sub Category"
                                onkeypress="return isChar(event)" id="" name="s_category" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Product Price</b></td>
                        <td><input type="text" maxlength="10" placeholder="Product Price"
                                onkeypress="return isNumber(event)" id="" name="p_price" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Discount</b></td>
                        <td><input type="text" maxlength="5" placeholder="Discount" id=""
                                onkeypress="return isNumber(event)" name="discount" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Original Price</b></td>
                        <td><input type="text" maxlength="10" placeholder="Original Price"
                                onkeypress="return isNumber(event)" id="" name="o_price" required=" ">
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Highlight</b></td>
                        <td><input type="text" maxlength="200" placeholder="highlight"
                                onkeypress="return isChar(event)" id="" name="highlight" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Discription</b></td>
                        <td><input type="text" maxlength="255" placeholder="Discription"
                                onkeypress="return isChar(event)" id="" name="discription" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Upload Picture</b></td>
                        <td><input type="file" placeholder=""
                                name="upload_picture" required=" "></td>
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