<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");  
    exit;
}
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
                <li class="active">Report</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Report</h3>
            <div class="container">
                <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <form action="#" method="post">
								<h2>Select Date</h2>
								<br><br>
                                <label class="col-form-label" style="text-align:left;font-size:20px;">From Date</label>
								<input type="date" class="form-control" Name="From_Date" placeholder="" required=""></br>
                                <label class="col-form-label" style="text-align:left;font-size:20px; ">To Date</label>
								<input type="date"class="form-control" Name="To_Date" placeholder="" required="">
								<br>
								<div class="send-button wthree agileits">
									<input type="submit" value="Submit" name="submit">
								</div>
							</form>
                        </div>
                        </div> <br><br><br>
                        <table class="responstable animated wow zoomIn" data-wow-delay=".5s">
                            <tr>
                                <th>Id</th>
                                <th><span>Product Name</span></th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Product price</th>
                                <th>Discount</th>
                                <th>Original price</th>
                                <th>Highlight</th>
                                <th>Discription</th>
                                <th>Img</th>
                                <th>Date And Time</th>
                            </tr>
                            <tr>
                                <?php 
                                if(isset($_POST['submit'])){
                                    include 'Include/dbconnect.php';
                                    $from_date = $_POST['From_Date'];
                                    $f_date = strtotime($from_date);
                                    $f_date = date('Y/m/d',$f_date);
                                        
                                    $to_date = $_POST['To_Date'];
                                    $t_date = strtotime($to_date);
                                    $t_date = date('Y/m/d',$t_date);
                                        
                                    // $qry = "select * from add_products where Date between '$f_date' and '$t_date'";
		            		        $disp="select * from add_products where dateandtime between '$f_date' and '$t_date'";
                                    
                                    // $run = mysqli_query($con, $qry);
		            		        $sql=mysqli_query($conn,$disp);
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
                                <td>
                                    <?php echo $row['10'];?>
                                </td>
                            </tr>
                            <?php } } ?>
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