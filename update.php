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
    include 'Include/dbconnect.php';
	$id=$_GET['id'];
    $qry = "SELECT * FROM `add_products` WHERE p_id = '$id'";
    $result = mysqli_query($conn,$qry);
    while($row = mysqli_fetch_array($result)){
        $p_name = $row["p_name"];
        $c_category = $row["c_category"];
        $s_category = $row["s_category"];
        $p_price = $row["p_price"];
        $discount = $row["discount"];
        $o_price = $row["o_price"];
        $highlight = $row["highlight"];
        $discription = $row["discription"];
    }
?>
<?php
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

    $target_dir = "Products_images/";
	$target_file = $target_dir.basename($_FILES["upload_picture"]["name"]);
    move_uploaded_file($_FILES['upload_picture']['tmp_name'],$target_file);

    $sql = "UPDATE `add_products` SET `p_name` = '$p_name', `c_category` = '$c_category', `s_category` = '$s_category', `p_price` = '$p_price', `discount` = '$discount', `o_price` = '$o_price', `highlight` = '$highlight', `discription` = '$discription' WHERE `p_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        echo "<script>alert('Recored Update Success')</script>";
    }else{
        echo "<script>alert('Recored Update Failed')</script>$";
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
            require ('Include/Header.php');
        ?>
    <!-- //header -->
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Update Product</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Update Product</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">If something stands between you and your success, move it. Never be denied.</p>
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <form action="#" method="POST" name="frm" enctype="multipart/form-data" onsubmit="return check(this)">
                        <?php
                            include 'Include/dbconnect.php';
                            $qry = "SELECT * FROM `add_products` WHERE p_id ='$id'";
                            $result = mysqli_query($conn,$qry);
                            while($row = mysqli_fetch_array($result)){
                        ?>
                    <tr>
                        <td><b>Product Name :</b></td>
                        <td><input type="text" value="<?php echo $row['p_name'];?>" placeholder="Product Name"
                                onkeypress="return isChar(event)" id="" name="p_name" required=" "></td>
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
                        <td><input type="text" value="<?php echo $row['s_category'];?>" placeholder="Choose Sub Category"
                                onkeypress="return isChar(event)" id="" name="s_category" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Product Price :</b></td>
                        <td><input type="text" value="<?php echo $row['p_price'];?>" placeholder="Product Price" onkeypress="return isNumber(event)" id=""
                                name="p_price" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Discount :</b></td>
                        <td><input type="text" value="<?php echo $row['discount'];?>" placeholder="Discount" id="" onkeypress="return isNumber(event)"
                                name="discount" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Original Price:</b></td>
                        <td><input type="text" value="<?php echo $row['o_price'];?>" placeholder="Original Price" onkeypress="return isNumber(event)" id=""
                                name="o_price" required=" ">
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Highlight :</b></td>
                        <td><input type="text" value="<?php echo $row['highlight'];?>" placeholder="highlight" onkeypress="return isChar(event)" id=""
                                name="highlight" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Discription:</b></td>
                        <td><input type="text" value="<?php echo $row['discription'];?>" placeholder="Discription" onkeypress="return isChar(event)" id=""
                                name="discription" required=" "></td>
                    </tr>
                    <br>
                    <tr>
                        <td><b>Upload Picture :</b></td>
                        <td><input type="file" placeholder="" 
                                name="upload_picture" required=" "></td>
                    </tr>

                    <input type="submit" value="Submit" name="Submit">
                </form>
                <?php } ?>
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