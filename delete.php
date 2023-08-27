<?php
include 'Include/dbconnect.php';
if($P_id=$_GET['P_id'])
{
		$qry="delete from `add_products` where `P_id`='$P_id' ";
		$sql=mysqli_query($conn,$qry);
		if($sql)
		{
			header('location:View_Product.php');
		}
		else
		{
			
			echo "fail".mysqli_error();
		}
}
else if($C_id=$_GET['C_id'])
{
		$qry="delete from `add_category` where `C_id`='$C_id' ";
		$sql=mysqli_query($conn,$qry);
		if($sql)
		{
			header('location:View_Category.php');
		}
		else
		{
			
			echo "fail".mysqli_error();
		}
}
else if($M_id=$_GET['M_id'])
{
		$qry="delete from `m_mail` where `M_id`='$M_id' ";
		$sql=mysqli_query($conn,$qry);
		if($sql)
		{
			header('location:M_Mail.php');
		}
		else
		{
			
			echo "fail".mysqli_error();
		}
}
else if($j_id=$_GET['j_id'])
{
		$qry="delete from `m_join_mail` where `j_id`='$j_id' ";
		$sql=mysqli_query($conn,$qry);
		if($sql)
		{
			header('location:m_join_mail.php');
		}
		else
		{
			
			echo "fail".mysqli_error();
		}
}
else if($o_id=$_GET['o_id'])
{
		$qry="delete from `place_order` where `o_id`='$o_id' ";
		$sql=mysqli_query($conn,$qry);
		if($sql)
		{
			header('location:M_Orderlist.php');		
		}
		else
		{
			
			echo "fail".mysqli_error();
		}
}
else if($r_id=$_GET['r_id'])
{
		$qry="delete from `review` where `r_id`='$r_id' ";
		$sql=mysqli_query($conn,$qry);
		if($sql)
		{
			header('location:M_Reviews.php');		
		}
		else
		{
			
			echo "fail".mysqli_error();
		}
}
else if($rid=$_GET['rid'])
{
		$qry="delete from `cart` where `rid`='$rid' ";
		$sql=mysqli_query($conn,$qry);
		if($sql)
		{
			header('location:checkout.php');		
		}
		else
		{
			
			echo "fail".mysqli_error();
		}
}
else if($id=$_GET['id'])
{
		$qry="delete from `registetion` where `id`='$id' ";
		$sql=mysqli_query($conn,$qry);
		if($sql)
		{
			header('location:M_Users.php');
		}
		else
		{
			
			echo "fail".mysqli_error();
		}
}

else if($id=$_GET['id'])
{
		$qry="delete from `place_order` where `id`='$id' ";
		$sql=mysqli_query($conn,$qry);
		if($sql)
		{
			header('location:M_Orderlist.php');
		}
		else
		{
			
			echo "fail".mysqli_error();
		}
}
?>