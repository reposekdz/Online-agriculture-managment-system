<?php
if(!isset($_SESSION)) { session_start(); }
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
$dt = date("Y-m-d");
$rupeesymbol= "RWF";
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Terimbere Muhinzi</title>
  <meta content="" name="Agriculture Management System is to help farmers by providing all kinds agriculture related information in the website.">
  <meta content="Online Agriculture Management System, OAMS" name="keywords">
  <link rel="icon" href="imgarticle/botany.png" type="image/png">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="c:\Users\JESSY\Downloads\DataTables\datatables.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" xintegrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>

  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto" style="background-color: blueviolet;">
          <h1 class="text-light" style="margin-left: -20px"><a href="index.php"><span>TM</span></a></h1>
          </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>

            <li class="<?php
                            if(basename($_SERVER['PHP_SELF']) == "index.php" )
                            {
                              echo ' active ';
                            }
                            ?>"><a href="index.php"><i class="fas fa-home"></i> Home</a></li> <li class="drop-down"><a href="#"><i class="fas fa-newspaper"></i> Articles</a> <ul>
			<li><a href="displayarticles.php?articletype=Blog"><i class="fas fa-blog"></i> Blogs</a></li> <li><a href="displaynews.php?articletype=News"><i class="fas fa-bullhorn"></i> News</a></li> </ul>
	</li>
   <li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "displayproducts.php" )
                            {
                              echo ' active ';
                            }
                            ?>"><a href="displayproducts.php" onclick='window.location=`displayproducts.php`' ><i class="fas fa-store"></i> Farmer's Market</a> <ul>
<?php
$sqlcategoryfk = "SELECT * FROM category where status='Active' AND category_type='SellingProduct'";
$qsqlcategoryfk =mysqli_query($con,$sqlcategoryfk);
echo mysqli_error($con);
while($rscategoryfk = mysqli_fetch_array($qsqlcategoryfk))
{
echo "<li><a href='displayproducts.php?category_id=$rscategoryfk[category_id]&category=$rscategoryfk[category]'  onclick='window.location=`displayproducts.php?category_id=$rscategoryfk[category_id]&category=$rscategoryfk[category]`' ><i class='fas fa-leaf'></i> $rscategoryfk[category]</a></li>"; // Leaf Icon for categories
}
?>
              </ul>
            </li>
			<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "displaysales.php" )
                            {
                              echo ' active ';
                            }
                            ?>"><a href="displaysales.php" onclick='window.location=`displaysales.php`'><i class="fas fa-tractor"></i> Farmer's Kit</a> <ul>
<?php
$sqlcategoryfm = "SELECT * FROM category where status='Active' AND category_type='Produce'";
$qsqlcategoryfm =mysqli_query($con,$sqlcategoryfm);
echo mysqli_error($con);
while($rscategoryfm = mysqli_fetch_array($qsqlcategoryfm))
{
echo "<li><a href='displaysales.php?category_id=$rscategoryfm[category_id]&category=$rscategoryfm[category]'  onclick='window.location=`displaysales.php?category_id=$rscategoryfm[category_id]&category=$rscategoryfm[category]`'><i class='fas fa-seedling'></i> $rscategoryfm[category]</a></li>"; // Seedling Icon for categories
}
?>
              </ul>
            </li>

            <li><a href="displayworkers.php"><i class="fas fa-hard-hat"></i> Hire</a></li> <?php
if(isset($_SESSION['customerid']))
{
?>
<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "customerpanel.php" || basename($_SERVER['PHP_SELF']) == "customerUpdate.php" || basename($_SERVER['PHP_SELF']) == "Customerchngpassword.php"  || basename($_SERVER['PHP_SELF']) == "viewcstpurchasereport.php"  || basename($_SERVER['PHP_SELF']) == "viewpurchaserequest.php"  || basename($_SERVER['PHP_SELF']) == "viewcstpurchaseorder.php"  || basename($_SERVER['PHP_SELF']) == "viewpurchasereport.php"  )
                            {
                              echo ' active ';
                            }
                            ?>" ><a href=""><i class="fas fa-user-circle"></i> My Account</a> <ul>
	<li><a href="customerpanel.php"><i class="fas fa-user"></i> Customer Panel</a></li> <li><a href="viewcstpurchasereport.php"><i class="fas fa-file-invoice-dollar"></i> Farmer's Market - Purchase Report</a></li>	<li><a href="viewpurchaserequest.php"><i class="fas fa-shopping-basket"></i> Farmer's Kit - View Purchase request</a></li> <li><a href="viewcstpurchaseorder.php"><i class="fas fa-clipboard-list"></i> Farmer's Kit - View Purchase Order</a></li> <li><a href="viewpurchasereport.php"><i class="fas fa-receipt"></i> Farmer's Kit - View Billing Report</a></li> <li><a href="customerUpdate.php"><i class="fas fa-edit"></i> Update Profile</a></li> <li><a href="Customerchngpassword.php"><i class="fas fa-key"></i> Change Password</a></li> <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li> </ul>
</li>
<?php
}
else if(isset($_SESSION['sellerid']))
{
?>
<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "viewworkerrequest.php" || basename($_SERVER['PHP_SELF']) == "viewcstpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "viewpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "viewpurchaseorder.php" || basename($_SERVER['PHP_SELF']) == "sellerpanelchart.php" || basename($_SERVER['PHP_SELF']) == "Product.php" || basename($_SERVER['PHP_SELF']) == "viewProduct.php" || basename($_SERVER['PHP_SELF']) == "sellerprofile.php" || basename($_SERVER['PHP_SELF']) == "Sellerchngpassword.php" || basename($_SERVER['PHP_SELF']) == "sellerpanel.php")
                            {
                              echo ' active ';
                            }
                            ?>" ><a href=""><i class="fas fa-user-tie"></i> My Account</a> <ul>
	<li><a href="sellerpanel.php"><i class="fas fa-user-cog"></i> Farmer/Seller Panel</a></li> <li class="drop-down"><a href="#"><i class="fas fa-user"></i> My Profile</a> <ul>
			<li><a href="sellerprofile.php"><i class="fas fa-edit"></i> Update Profile</a></li> <li><a href="Sellerchngpassword.php"><i class="fas fa-key"></i> Change Password</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#"><i class="fas fa-store-alt"></i> Seller Settings</a> <ul>
			<li><a href="Product.php"><i class="fas fa-tags"></i> Put Your Products On Sale</a></li> <li><a href="viewProduct.php"><i class="fas fa-eye"></i> View Your Products On Sale</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#"><i class="fas fa-chart-bar"></i> Sales Report</a> <ul>
		<?php
		/*
			<li><a href="sellerpanelchart.php">Progress Chart</a></li>
		*/
		?>
          	<li><a href="viewsellerpurchaserequest.php"><i class="fas fa-shopping-cart"></i> View Purchase Request</a></li> <li><a href="viewpurchaseorder.php"><i class="fas fa-clipboard-check"></i> View Purchase Order</a></li> <li><a href="viewpurchasereport.php"><i class="fas fa-file-invoice"></i> Purchase Billing Report</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#"><i class="fas fa-tractor"></i> Farmer's Settings</a> <ul>
		<li><a href="sellingproduct.php"><i class="fas fa-plus-circle"></i> Add Products to Farmer's Market</a></li> <li><a href="viewsproduct.php"><i class="fas fa-list"></i> View Products to Farmer's Market</a></li> </ul>
	</li>
	<li class="drop-down"><a href="#"><i class="fas fa-chart-line"></i> Farmer's Market Report</a> <ul>
			<li><a href="viewcstpurchasereport.php"><i class="fas fa-file-alt"></i> Product Purchase Report</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#"><i class="fas fa-users"></i> Hire details</a> <ul>
			<li><a href="viewworkerrequest.php"><i class="fas fa-user-check"></i> View Hired Worker</a></li> </ul>
	</li>

	<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li> </ul>
</li>
<?php
}
else if(isset($_SESSION['workerid']))
{
?>
<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "workerpanel.php" || basename($_SERVER['PHP_SELF']) == "workerprofile.php" || basename($_SERVER['PHP_SELF']) == "Workerchngpassword.php"  )
                            {
                              echo ' active ';
                            }
                            ?>" ><a href=""><i class="fas fa-wrench"></i> My Account</a> <ul>
	<li><a href="workerpanel.php"><i class="fas fa-tools"></i> Worker Panel</a></li> <li><a href="workerprofile.php"><i class="fas fa-user"></i> My Profile</a></li> <li><a href="Workerchngpassword.php"><i class="fas fa-key"></i> Change Password</a></li> <li><a href="viewworkerrequest.php"><i class="fas fa-briefcase"></i> View Your Jobs</a></li> <li><a href="workerpanel.php?workschedule=set"><i class="fas fa-calendar-alt"></i> Work Schedule</a></li> <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li> </ul>
</li>
<?php
}
else if(isset($_SESSION['adminid']))
{
?>
<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "adminpanel.php" || basename($_SERVER['PHP_SELF']) == "customerUpdate.php" || basename($_SERVER['PHP_SELF']) == "Customerchngpassword.php" || basename($_SERVER['PHP_SELF']) == "adminpanel.php" || basename($_SERVER['PHP_SELF']) == "customerUpdate.php" || basename($_SERVER['PHP_SELF']) == "Customerchngpassword.php" || basename($_SERVER['PHP_SELF']) == "viewcustomerReg.php" || basename($_SERVER['PHP_SELF']) == "viewadminpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "viewadminpurchaserequest.php" || basename($_SERVER['PHP_SELF']) == "viewpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "admin.php" || basename($_SERVER['PHP_SELF']) == "viewadmin.php" || basename($_SERVER['PHP_SELF']) == "chngadminpassword.php" || basename($_SERVER['PHP_SELF']) == "city.php" || basename($_SERVER['PHP_SELF']) == "viewcity.php" || basename($_SERVER['PHP_SELF']) == "state.php" || basename($_SERVER['PHP_SELF']) == "viewstate.php" || basename($_SERVER['PHP_SELF']) == "country.php" || basename($_SERVER['PHP_SELF']) == "viewcountry.php" || basename($_SERVER['PHP_SELF']) == "category.php" || basename($_SERVER['PHP_SELF']) == "viewcategory.php" || basename($_SERVER['PHP_SELF']) == "Produce.php" || basename($_SERVER['PHP_SELF']) == "viewProduce.php" || basename($_SERVER['PHP_SELF']) == "variety.php" || basename($_SERVER['PHP_SELF']) == "viewvariety.php" || basename($_SERVER['PHP_SELF']) == "sellingproduce.php" || basename($_SERVER['PHP_SELF']) == "viewSellingProduce.php" || basename($_SERVER['PHP_SELF']) == "viewseller.php" || basename($_SERVER['PHP_SELF']) == "viewworker.php" || basename($_SERVER['PHP_SELF']) == "viewworkerrequest.php" || basename($_SERVER['PHP_SELF']) == "sellingproduct.php" || basename($_SERVER['PHP_SELF']) == "viewsellingproduct.php" || basename($_SERVER['PHP_SELF']) == "article.php" || basename($_SERVER['PHP_SELF']) == "viewarticle.php" )
                            {
                              echo ' active ';
                            }
                            ?>" ><a href=""><i class="fas fa-user-shield"></i> My Account</a> <ul>
	<li><a href="adminpanel.php"><i class="fas fa-cogs"></i> Admin Panel</a></li> <li class="drop-down"><a href="#"><i class="fas fa-file-alt"></i> Report</a> <ul>
		<li><a href="viewcustomerReg.php"><i class="fas fa-users"></i> Customer Account Report</a></li>      <li><a href="viewseller.php"><i class="fas fa-user-friends"></i> Farmer Account Report</a></li> <li><a href="viewadminpurchasereport.php"><i class="fas fa-file-invoice-dollar"></i> Farmer's Market - Product Billing Report</a></li> <li><a href="viewSellingProduce.php"><i class="fas fa-seedling"></i> Farmer's Kit - Produce Report</a></li> <li><a href="viewadminpurchaserequest.php"><i class="fas fa-shopping-basket"></i> Farmer's Kit - Produce Purchase Request</a></li> <li><a href="viewpurchasereport.php"><i class="fas fa-receipt"></i> Farmer's Kit - Produce Billing Report</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#"><i class="fas fa-cog"></i> General Settings</a> <ul>
<li><a href="admin.php"><i class="fas fa-user-plus"></i> Add Admin</a></li> <li><a href="viewadmin.php"><i class="fas fa-user-shield"></i> View Admin</a></li> <li><a href="chngadminpassword.php"><i class="fas fa-key"></i> Change My Password</a></li> <li><a href="city.php"><i class="fas fa-city"></i> Add City</a></li> <li><a href="viewcity.php"><i class="fas fa-building"></i> View City</a></li> <li><a href="state.php"><i class="fas fa-flag-usa"></i> Add State</a></li> <li><a href="viewstate.php"><i class="fas fa-map"></i> View State</a></li>   						<li><a href="country.php"><i class="fas fa-globe-americas"></i> Add Country</a></li> <li><a href="viewcountry.php"><i class="fas fa-globe"></i> View Country</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#"><i class="fas fa-store"></i> Seller Settings</a> <ul>
<li><a href="category.php?cattype=Produce"><i class="fas fa-tags"></i> Add Product category</a></li> <li><a href="viewcategory.php?cattype=Produce"><i class="fas fa-list-alt"></i> View Product category</a></li>   <li><a href="Produce.php"><i class="fas fa-carrot"></i> Add Product types</a></li> <li><a href="viewProduce.php"><i class="fas fa-seedling"></i> View Product types</a></li>       <li><a href="variety.php?varietytype=Produce"><i class="fas fa-leaf"></i> Add Product Variety</a></li> <li><a href="viewvariety.php?varietytype=Produce"><i class="fas fa-list"></i> View Product Variety</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#"><i class="fas fa-hard-hat"></i> Worker</a> <ul>
<li><a href="viewworker.php"><i class="fas fa-users"></i> View Worker</a></li> <li><a href="viewworkerrequest.php"><i class="fas fa-clipboard-list"></i> View Worker Request</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#"><i class="fas fa-tractor"></i> Farmer's Settings</a> <ul>
		<li><a href="category.php?cattype=SellingProduct"><i class="fas fa-tags"></i> Add Selling Product Category</a></li>     <li><a href="viewcategory.php?cattype=SellingProduct"><i class="fas fa-list-alt"></i> View Selling Product Category</a></li>  <li><a href="sellingproduct.php"><i class="fas fa-plus-circle"></i> Add Products to Farmer's Market</a></li> <li><a href="viewsellingproduct.php"><i class="fas fa-list"></i> View Products to Farmer's Market</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#"><i class="fas fa-newspaper"></i> Article Settings</a> <ul>
		<li><a href="article.php"><i class="fas fa-plus-square"></i> Add Article</a></li>         <li><a href="viewarticle.php"><i class="fas fa-eye"></i> View Article</a></li> </ul>
	</li>

	<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li> </ul>
</li>
<?php
}
else
{
?>
<li class="drop-down"><a href=""><i class="fas fa-user-circle"></i> My Account</a> <ul>
	<li><a href="customerreglogin.php"><i class="fas fa-user"></i> As Customer</a></li> <li><a href="farmerreglogin.php"><i class="fas fa-user-tie"></i> As Farmer/Seller</a></li> <li><a href="workerreglogin.php"><i class="fas fa-hard-hat"></i> As Worker</a></li> </ul>
</li>
<?php
}
?>
			<li><a href="contact.php"><i class="fas fa-envelope"></i> Contact Us</a></li> <?php
$sqlproduct_purchase_record = "SELECT * FROM  product_purchase_record
WHERE status='Pending'";
if(isset($_SESSION['customerid']))
{
$sqlproduct_purchase_record =$sqlproduct_purchase_record  . " AND customer_id='$_SESSION[customerid]' ";
}
else if(isset($_SESSION['sellerid']))
{
$sqlproduct_purchase_record =$sqlproduct_purchase_record  . " AND seller_id='$_SESSION[sellerid]' ";
}
else
{
$sqlproduct_purchase_record =$sqlproduct_purchase_record  . " AND selling_prod_id='0' ";
}
$qsqlproduct_purchase_record = mysqli_query($con,$sqlproduct_purchase_record);
if(mysqli_num_rows($qsqlproduct_purchase_record) >= 1)
{
?>
<li class="get-started"><a href="displaycart.php"><i class="fas fa-shopping-cart"></i> Cart (<?php echo mysqli_num_rows($qsqlproduct_purchase_record); ?>)</a></li> <?php
}
else
{
?>
<li  class="get-started" ><a href="#"><i class="fas fa-shopping-cart"></i> Cart (<?php echo mysqli_num_rows($qsqlproduct_purchase_record); ?>) </a></li> <?php
}
?>
      </ul>
        </nav></div></div>
  </header>
