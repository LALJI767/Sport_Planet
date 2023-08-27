<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");  
    exit;
}
?>
<?php
include("Include/dbconnect.php");
?>
<!DOCTYPE html>
<html>
<?php
        require('Include/head.php');
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
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">View Products</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">View Products</h3> <br> <br> <br> <br> <br>
            <table class="responstable animated wow zoomIn" data-wow-delay=".5s">
                <tr>
                    <th>Id</th>
                    <th data-th="Driver details"><span>Product Name</span></th>
                    <th>Category Name</th>
                    <th>Sub Category Name</th>
                    <th>Product price</th>
                    <th>Discount</th>
                    <th>Original price</th>
                    <th>Highlight</th>
                    <th>Discription</th>
                    <th>Img</th>
                    <th>Action</th>
                </tr>

                <tr>
                    <?php 
				$disp="select * from add_products";
				$sql=mysqli_query($conn,$disp);
				// echo $disp;
				
				while($row = mysqli_fetch_array($sql))
				{
			?>
                <tr>
                    <td height="43">
                        <?php echo $row['0'];?>
                    </td>
                    <td>
                        <?php echo $row['1'];?>
                    </td>
                    <td>
                        <?php echo $row['2'];?>
                    </td>
                    <td>
                        <?php echo $row['3'];?>
                    </td>
                    <td>
                        <?php echo $row['4'];?>
                    </td>
                    <td>
                        <?php echo $row['5'];?>
                    </td>
                    <td>
                        <?php echo $row['6'];?>
                    </td>
                    <td>
                        <?php echo $row['7'];?>
                    </td>
                    <td>
                        <?php echo $row['8'];?>
                    </td>

                    <td>
                        <?php echo "<img src='Products_images/".$row['upload_picture']."' width='70' height='45' />"; ?>
                    </td>
                    <td><span onClick="return confirm('Are You Sure?')"> <a
                                href="update.php?id=<?php echo $row['0'];?>">UPDATE</a></span>/
                        <span onClick="return confirm('Are You Sure?')"> <a href='delete.php?P_id=<?php echo $row['0']?>'>DELETE</a></span>
                    </td>
                </tr>
                <?php
				    }
		        ?>
                </tr>

            </table>
    </div>
    <!-- footer -->
    <?php
            require ('Include/footer.php');
    
        ?>
    <!-- //footer -->
</body>

</html>