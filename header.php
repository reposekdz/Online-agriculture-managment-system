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
  <style>
    .text-light{
      color: color: #fff;;
    }
  </style>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>T-M-M-Z-&-Rwanda </title>
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
  <link href="assets/css/custom-header.css" rel="stylesheet"> <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>

  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto" style="background-color: blueviolet;">
          <h1 class="text-light" style="margin-left: -25px; font-size: 30px; color: #fff;" ><a href="index.php"><span>TM</span></a></h>
          </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>

            <li class="<?php
                            if(basename($_SERVER['PHP_SELF']) == "index.php" )
                            {
                              echo ' active ';
                            }
                            ?>"><a href="index.php" data-key="nav_home"><i class="fas fa-home"></i> Home</a></li> <li class="drop-down"><a href="#" data-key="nav_articles"><i class="fas fa-newspaper"></i> Articles</a> <ul>
			<li><a href="displayarticles.php?articletype=Blog" data-key="nav_blogs"><i class="fas fa-blog"></i> Blogs</a></li> <li><a href="displaynews.php?articletype=News" data-key="nav_news"><i class="fas fa-bullhorn"></i> News</a></li> </ul>
	</li>
   <li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "displayproducts.php" )
                            {
                              echo ' active ';
                            }
                            ?>"><a href="displayproducts.php" onclick='window.location=`displayproducts.php`' data-key="nav_farmers_market"><i class="fas fa-store"></i> Farmer's Market</a> <ul>
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
                            ?>"><a href="displaysales.php" onclick='window.location=`displaysales.php`' data-key="nav_farmers_kit"><i class="fas fa-tractor"></i> Farmer's Kit</a> <ul>
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

            <li><a href="displayworkers.php" data-key="nav_hire"><i class="fas fa-hard-hat"></i> Hire</a></li> <?php
if(isset($_SESSION['customerid']))
{
?>
<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "customerpanel.php" || basename($_SERVER['PHP_SELF']) == "customerUpdate.php" || basename($_SERVER['PHP_SELF']) == "Customerchngpassword.php"  || basename($_SERVER['PHP_SELF']) == "viewcstpurchasereport.php"  || basename($_SERVER['PHP_SELF']) == "viewpurchaserequest.php"  || basename($_SERVER['PHP_SELF']) == "viewcstpurchaseorder.php"  || basename($_SERVER['PHP_SELF']) == "viewpurchasereport.php"  )
                            {
                              echo ' active ';
                            }
                            ?>" ><a href="" data-key="nav_my_account"><i class="fas fa-user-circle"></i> My Account</a> <ul>
	<li><a href="customerpanel.php" data-key="nav_customer_panel"><i class="fas fa-user"></i> Customer Panel</a></li> <li><a href="viewcstpurchasereport.php" data-key="nav_fm_purchase_report"><i class="fas fa-file-invoice-dollar"></i> Farmer's Market - Purchase Report</a></li>	<li><a href="viewpurchaserequest.php" data-key="nav_fk_view_pr"><i class="fas fa-shopping-basket"></i> Farmer's Kit - View Purchase request</a></li> <li><a href="viewcstpurchaseorder.php" data-key="nav_fk_view_po"><i class="fas fa-clipboard-list"></i> Farmer's Kit - View Purchase Order</a></li> <li><a href="viewpurchasereport.php" data-key="nav_fk_view_billing"><i class="fas fa-receipt"></i> Farmer's Kit - View Billing Report</a></li> <li><a href="customerUpdate.php" data-key="nav_update_profile"><i class="fas fa-edit"></i> Update Profile</a></li> <li><a href="Customerchngpassword.php" data-key="nav_change_password"><i class="fas fa-key"></i> Change Password</a></li> <li><a href="logout.php" data-key="nav_logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li> </ul>
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
                            ?>" ><a href="" data-key="nav_my_account"><i class="fas fa-user-tie"></i> My Account</a> <ul>
	<li><a href="sellerpanel.php" data-key="nav_seller_panel"><i class="fas fa-user-cog"></i> Farmer/Seller Panel</a></li> <li class="drop-down"><a href="#" data-key="nav_my_profile"><i class="fas fa-user"></i> My Profile</a> <ul>
			<li><a href="sellerprofile.php" data-key="nav_update_profile"><i class="fas fa-edit"></i> Update Profile</a></li> <li><a href="Sellerchngpassword.php" data-key="nav_change_password"><i class="fas fa-key"></i> Change Password</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#" data-key="nav_seller_settings"><i class="fas fa-store-alt"></i> Seller Settings</a> <ul>
			<li><a href="Product.php" data-key="nav_put_products_on_sale"><i class="fas fa-tags"></i> Put Your Products On Sale</a></li> <li><a href="viewProduct.php" data-key="nav_view_products_on_sale"><i class="fas fa-eye"></i> View Your Products On Sale</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#" data-key="nav_sales_report"><i class="fas fa-chart-bar"></i> Sales Report</a> <ul>
		<?php
		/*
			<li><a href="sellerpanelchart.php">Progress Chart</a></li>
		*/
		?>
          	<li><a href="viewsellerpurchaserequest.php" data-key="nav_view_pr"><i class="fas fa-shopping-cart"></i> View Purchase Request</a></li> <li><a href="viewpurchaseorder.php" data-key="nav_view_po"><i class="fas fa-clipboard-check"></i> View Purchase Order</a></li> <li><a href="viewpurchasereport.php" data-key="nav_purchase_billing_report"><i class="fas fa-file-invoice"></i> Purchase Billing Report</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#" data-key="nav_farmers_settings"><i class="fas fa-tractor"></i> Farmer's Settings</a> <ul>
		<li><a href="sellingproduct.php" data-key="nav_add_products_fm"><i class="fas fa-plus-circle"></i> Add Products to Farmer's Market</a></li> <li><a href="viewsproduct.php" data-key="nav_view_products_fm"><i class="fas fa-list"></i> View Products to Farmer's Market</a></li> </ul>
	</li>
	<li class="drop-down"><a href="#" data-key="nav_farmers_market_report"><i class="fas fa-chart-line"></i> Farmer's Market Report</a> <ul>
			<li><a href="viewcstpurchasereport.php" data-key="nav_product_purchase_report"><i class="fas fa-file-alt"></i> Product Purchase Report</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#" data-key="nav_hire_details"><i class="fas fa-users"></i> Hire details</a> <ul>
			<li><a href="viewworkerrequest.php" data-key="nav_view_hired_worker"><i class="fas fa-user-check"></i> View Hired Worker</a></li> </ul>
	</li>

	<li><a href="logout.php" data-key="nav_logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li> </ul>
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
                            ?>" ><a href="" data-key="nav_my_account"><i class="fas fa-wrench"></i> My Account</a> <ul>
	<li><a href="workerpanel.php" data-key="nav_worker_panel"><i class="fas fa-tools"></i> Worker Panel</a></li> <li><a href="workerprofile.php" data-key="nav_my_profile"><i class="fas fa-user"></i> My Profile</a></li> <li><a href="Workerchngpassword.php" data-key="nav_change_password"><i class="fas fa-key"></i> Change Password</a></li> <li><a href="viewworkerrequest.php" data-key="nav_view_your_jobs"><i class="fas fa-briefcase"></i> View Your Jobs</a></li> <li><a href="workerpanel.php?workschedule=set" data-key="nav_work_schedule"><i class="fas fa-calendar-alt"></i> Work Schedule</a></li> <li><a href="logout.php" data-key="nav_logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li> </ul>
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
                            ?>" ><a href="" data-key="nav_my_account"><i class="fas fa-user-shield"></i> My Account</a> <ul>
	<li><a href="adminpanel.php" data-key="nav_admin_panel"><i class="fas fa-cogs"></i> Admin Panel</a></li> <li class="drop-down"><a href="#" data-key="nav_report"><i class="fas fa-file-alt"></i> Report</a> <ul>
		<li><a href="viewcustomerReg.php" data-key="nav_customer_account_report"><i class="fas fa-users"></i> Customer Account Report</a></li>      <li><a href="viewseller.php" data-key="nav_farmer_account_report"><i class="fas fa-user-friends"></i> Farmer Account Report</a></li> <li><a href="viewadminpurchasereport.php" data-key="nav_fm_billing_report"><i class="fas fa-file-invoice-dollar"></i> Farmer's Market - Product Billing Report</a></li> <li><a href="viewSellingProduce.php" data-key="nav_fk_produce_report"><i class="fas fa-seedling"></i> Farmer's Kit - Produce Report</a></li> <li><a href="viewadminpurchaserequest.php" data-key="nav_fk_produce_pr"><i class="fas fa-shopping-basket"></i> Farmer's Kit - Produce Purchase Request</a></li> <li><a href="viewpurchasereport.php" data-key="nav_fk_produce_billing"><i class="fas fa-receipt"></i> Farmer's Kit - Produce Billing Report</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#" data-key="nav_general_settings"><i class="fas fa-cog"></i> General Settings</a> <ul>
<li><a href="admin.php" data-key="nav_add_admin"><i class="fas fa-user-plus"></i> Add Admin</a></li> <li><a href="viewadmin.php" data-key="nav_view_admin"><i class="fas fa-user-shield"></i> View Admin</a></li> <li><a href="chngadminpassword.php" data-key="nav_change_my_password"><i class="fas fa-key"></i> Change My Password</a></li> <li><a href="city.php" data-key="nav_add_city"><i class="fas fa-city"></i> Add City</a></li> <li><a href="viewcity.php" data-key="nav_view_city"><i class="fas fa-building"></i> View City</a></li> <li><a href="state.php" data-key="nav_add_state"><i class="fas fa-flag-usa"></i> Add State</a></li> <li><a href="viewstate.php" data-key="nav_view_state"><i class="fas fa-map"></i> View State</a></li>   						<li><a href="country.php" data-key="nav_add_country"><i class="fas fa-globe-americas"></i> Add Country</a></li> <li><a href="viewcountry.php" data-key="nav_view_country"><i class="fas fa-globe"></i> View Country</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#" data-key="nav_seller_settings"><i class="fas fa-store"></i> Seller Settings</a> <ul>
<li><a href="category.php?cattype=Produce" data-key="nav_add_product_category"><i class="fas fa-tags"></i> Add Product category</a></li> <li><a href="viewcategory.php?cattype=Produce" data-key="nav_view_product_category"><i class="fas fa-list-alt"></i> View Product category</a></li>   <li><a href="Produce.php" data-key="nav_add_product_types"><i class="fas fa-carrot"></i> Add Product types</a></li> <li><a href="viewProduce.php" data-key="nav_view_product_types"><i class="fas fa-seedling"></i> View Product types</a></li>       <li><a href="variety.php?varietytype=Produce" data-key="nav_add_product_variety"><i class="fas fa-leaf"></i> Add Product Variety</a></li> <li><a href="viewvariety.php?varietytype=Produce" data-key="nav_view_product_variety"><i class="fas fa-list"></i> View Product Variety</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#" data-key="nav_worker"><i class="fas fa-hard-hat"></i> Worker</a> <ul>
<li><a href="viewworker.php" data-key="nav_view_worker"><i class="fas fa-users"></i> View Worker</a></li> <li><a href="viewworkerrequest.php" data-key="nav_view_worker_request"><i class="fas fa-clipboard-list"></i> View Worker Request</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#" data-key="nav_farmers_settings"><i class="fas fa-tractor"></i> Farmer's Settings</a> <ul>
		<li><a href="category.php?cattype=SellingProduct" data-key="nav_add_selling_product_category"><i class="fas fa-tags"></i> Add Selling Product Category</a></li>     <li><a href="viewcategory.php?cattype=SellingProduct" data-key="nav_view_selling_product_category"><i class="fas fa-list-alt"></i> View Selling Product Category</a></li>  <li><a href="sellingproduct.php" data-key="nav_add_products_fm"><i class="fas fa-plus-circle"></i> Add Products to Farmer's Market</a></li> <li><a href="viewsellingproduct.php" data-key="nav_view_products_fm"><i class="fas fa-list"></i> View Products to Farmer's Market</a></li> </ul>
	</li>

	<li class="drop-down"><a href="#" data-key="nav_article_settings"><i class="fas fa-newspaper"></i> Article Settings</a> <ul>
		<li><a href="article.php" data-key="nav_add_article"><i class="fas fa-plus-square"></i> Add Article</a></li>         <li><a href="viewarticle.php" data-key="nav_view_article"><i class="fas fa-eye"></i> View Article</a></li> </ul>
	</li>

	<li><a href="logout.php" data-key="nav_logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li> </ul>
</li>
<?php
}
else
{
?>
<li class="drop-down"><a href="" data-key="nav_my_account"><i class="fas fa-user-circle"></i> My Account</a> <ul>
	<li><a href="customerreglogin.php" data-key="nav_as_customer"><i class="fas fa-user"></i> As Customer</a></li> <li><a href="farmerreglogin.php" data-key="nav_as_farmer_seller"><i class="fas fa-user-tie"></i> As Farmer/Seller</a></li> <li><a href="workerreglogin.php" data-key="nav_as_worker"><i class="fas fa-hard-hat"></i> As Worker</a></li> </ul>
</li>
<?php
}
?>
			<li><a href="contact.php" data-key="nav_contact_us"><i class="fas fa-envelope"></i> Contact Us</a></li> <?php
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
<li class="get-started"><a href="displaycart.php" data-key="nav_cart"><i class="fas fa-shopping-cart"></i> Cart (<?php echo mysqli_num_rows($qsqlproduct_purchase_record); ?>)</a></li> <?php
}
else
{
?>
<li  class="get-started" ><a href="#" data-key="nav_cart"><i class="fas fa-shopping-cart"></i> Cart (<?php echo mysqli_num_rows($qsqlproduct_purchase_record); ?>) </a></li> <?php
}
?>
      </ul>
        </nav>
        </div>
    </div>
  </header>

  <script src="assets/js/custom-header.js"></script>
