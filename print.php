<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System |  Issued Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<?php
	require 'conn.php';
?>
<html lang="en">
	<head>
		<style>	
		.table {
			width: 100%;
			margin-bottom: 20px;
		}	
 
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
			background-color: #f9f9f9;
		}
 
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
 
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
	</style>
	</head>
<body>
	
	<br /> <br /> <br /> <br />
	<b style="color:blue;font-family:Times New Roman;font-size:20px;">Date Prepared:</b>
	<?php
		$date = date("Y-m-d", strtotime("+6 HOURS"));
		echo $date;
	?>
	<br /><br />
	<table class="table table-striped table-bordered table-hove">
		<thead>
			<tr>
                <th>S.NO</th>
                <th>Book Name</th>
                <th>Category</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Price</th>
			</tr>
		</thead>
		<tbody>
			<?php
				require 'conn.php';
 
				$query = $conn->query("SELECT tblbooks.id,tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid,tblbooks.bookImage from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId");
				while($fetch = $query->fetch_array()){
 
			?>
 
			<tr>
				<td style="text-align:center;"><?php echo $fetch['id']?></td>
				<td style="text-align:center;"><?php echo $fetch['BookName']?></td>
				<td style="text-align:center;"><?php echo $fetch['CategoryName']?></td>
				<td style="text-align:center;"><?php echo $fetch['AuthorName']?></td>
				<td style="text-align:center;"><?php echo $fetch['ISBNNumber']?></td>
				<td style="text-align:center;"><?php echo $fetch['BookPrice']?></td>
			</tr>
					
			<?php
				}
			?>
		</tbody>
	</table>
	<center><button class="btn btn-success pull-center" id="PrintButton"  onclick="PrintPage()"><span class="glyphicon glyphicon-print"></span>Print</button></center>
</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
</script>
<!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
