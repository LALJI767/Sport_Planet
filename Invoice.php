<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");  
    exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<?php
								include 'Include/dbconnect.php';
								$email = $_SESSION['email'];
								$id = $_REQUEST['id'];
                        		$qry = "select * from `place_order` where o_id = '$id'";
                        		$sql = mysqli_query($conn,$qry);
				        		while($row = mysqli_fetch_array($sql)){
							?>
							<tr>
								<td class="title">
                                    <h3><u>Sport Planet</u></h3>
								</td>
								<td>
									Created: <?php echo $row['dateandtime'];?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<?php echo $row['address'];?><br />
									<?php echo $row['address2'];?><br />
									<?php echo $row['state'];?><br />
									<?php echo $row['city'];?><br />
									<?php echo $row['pincode'];?>
								</td>

								<td>
									Sport Planet<br />
									ethicalx00@gmail.com
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>

					<td></td>
				</tr>

				<tr class="details">
					<td><?php echo $row['payment'];?></td>

					<td></td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td><?php echo $row['p_name'];?></td>

					<td>₹<?php echo $row['p_price'];?></td>
				</tr>
				<tr class="total">
					<td></td>
					<td>Total: ₹<?php echo $row['p_price'];?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>