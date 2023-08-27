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
                <li class="active">Manage Users</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Manage Users</h3> <br> <br> <br> <br> <br>
            <table class="responstable animated wow zoomIn" data-wow-delay=".5s">
            <tr>
				<th>Id</th>
                <th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Action</th>
		  </tr>
        
        <tr>
			<?php 
				$disp="select * from registetion";
				$sql=mysqli_query($conn,$disp);
				// echo $disp;
				
				while($row = mysqli_fetch_array($sql))
				{
			?>
            <tr>
				<td height="43"><?php echo $row['0'];?></td>
				<td><?php echo $row['1'];?></td>
				<td><?php echo $row['2'];?></td>
				<td><?php echo $row['3'];?></td>

				<td><span onClick="return confirm('Are You Sure?')"> <a href='delete.php?id=<?php echo $row['0']?>'>DELETE</a></span></td>
            </tr>
                <?php
				    }
		        ?>
        </tr>

            </table>
        </div>
    </div>
    <!-- footer -->
    <?php
            require ('Include/footer.php');
    
        ?>
    <!-- //footer -->
</body>
</html>