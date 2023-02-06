<!-- Left Slide Bar Start -->
<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<!-- <img src="../vendors/images/img/cda _logo.png" alt="" class="dark-logo">
				<img src="../vendors/images/img/light_logo1.png" alt="" class="light-logo"> -->
				<!-- <img src="<?php// echo (!empty($row['Picture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" alt=""  class="avatar-photo"  class="light-logo">> -->
				<div class="container p-5">
					<div class="col-6">
						<img src="<?php echo (!empty($row['Logo'])) ? '../uploads/logos/'.$row['Logo'] : '../uploads/logos/NO-IMAGE-AVAILABLE1.jpg'; ?>" class="border-radius-100 shadow" width="65" height="65" alt="">
					</div>				
				</div>
				
				<div class="container pd-5 ">
				<!-- <span class="text-center mb-0" style="color: light"><?php// echo " ". $row['Name']; ?></span> -->
				<!-- <h5 class="text-left h7 mb-0 " style="color:white"  ><?php //echo " ". $row['Com_name']. " "; ?></h5> -->
				</div>
				<!-- <img src="<?php //echo (!empty($row['Piture'])) ? '../uploads/'.$row['Picture'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" class="light-logo" width="50" height="50" alt=""> -->

			</a>
			
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">

                    <li class="dropdown">
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
						
                    </li>
                    <!-- <i class="icon-copy fa fa-user" aria-hidden="true"></i> -->
                    <i class="icon-copy iclipboardon-"></i>
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user"></span><span class="mtext">User</span>
						</a>
						<ul class="submenu">
							<li><a href="user.php">Register User</a></li>
							<li><a href="Mng_user.php">Manage User</a></li>
						</ul>
					</li>

                    
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Customer</span>
						</a>
						<ul class="submenu">
							<li><a href="Invoice.php">Invoice</a></li>
							<li><a href="Receipt.php">Recipts</a></li>
						</ul>
					</li>

                    
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Suppliers</span>
						</a>
						<ul class="submenu">
							<li><a href="vendor_invoice.php">Vendor Invoice</a></li>
							<li><a href="vendor_payment.php">Vendor Payment</a></li>
						</ul>
					</li>

                    
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-money-2"></span><span class="mtext">Financial</span>
						</a>
						<ul class="submenu">
							<li><a href="cash_receipt.php">Cash Receipt</a></li>
							<li><a href="cash_payment.php">Cash Payment</a></li>
						</ul>
					</li>

                    
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Report </span>
						</a>
						<ul class="submenu">
							<li><a href="financial_report.php">Financial Report</a></li>
							<li><a href="Cust_Report.php">Customer Report</a></li>
                            <li><a href="Supplier_report.php">Suppliers Report</a></li>
						</ul>
					</li>

					<li>
						<div class="sidebar-small-cap">Extra</div>
					</li>

					
                    <li class="dropdown">
						<a href="video.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-eye"></span><span class="mtext">Video</span>
						</a>
						
                    </li>

					<li>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-edit-2"></span><span class="mtext">Documentation</span>
						</a>
						<ul class="submenu">
							<li><a href="introduction.html">Introduction</a></li>
							<li><a href="getting-started.html">Getting Started</a></li>
							<li><a href="color-settings.html">Color Settings</a></li>
							<li><a href="third-party-plugins.html">Third Party Plugins</a></li>
						</ul>
					</li>
					<li>
						<a href="#" target="_blank" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-paper-plane1"></span>
							<span class="mtext">Landing Page <img src="../vendors/images/coming-soon.png" alt="" width="25"></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Lesft Slide Bar End -->
