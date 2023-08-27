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
                <li class="active">Manage Orders</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Manage Orders</h3> <br> <br> <br> <br> <br>
            <table class="responstable animated wow zoomIn" data-wow-delay=".5s" >
                <tr>
                    <th>Id</th>
                    <th>Email </th>
                    <th>Address</th>
                    <th>Address 2</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Pin Code</th>
                    <th>Mobile Number</th>
                    <th>Alternate Number</th>
                    <th>Payment</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php 
				        $disp="select * from place_order";
				        $sql=mysqli_query($conn,$disp);
				
				        while($row = mysqli_fetch_array($sql)){
			        ?>
                <tr>
                    <td height="43">
                        <?php echo $row['o_id'];?>
                    </td>
                    <td>
                        <?php echo $row['email'];?>
                    </td>
                    <td>
                        <?php echo $row['address'];?>
                    </td>
                    <td>
                        <?php echo $row['address2'];?>
                    </td>
                    <td>
                        <?php echo $row['state'];?>
                    </td>
                    <td>
                        <?php echo $row['city'];?>
                    </td>
                    <td>
                        <?php echo $row['pincode'];?>
                    </td>
                    <td>
                        <?php echo $row['number1'];?>
                    </td>
                    <td>
                        <?php echo $row['number2'];?>
                    </td>
                    <td>
                        <?php echo $row['payment'];?>
                    </td>
                    <td><span onClick="return confirm('Are You Sure?')"> <a href='delete.php?o_id=<?php echo $row['0']?>'>DELETE</a></span></td>
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