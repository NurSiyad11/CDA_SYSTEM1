<!-- Left Slide Bar Start -->
<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="../vendors/images/img/light_logo1.png" alt="" class="light-logo">
			</a>
			
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<?php
					$admin_role = $conn->query("SELECT Role as rol from `user` where ID='$session_id' ")->fetch_assoc()['rol'];
				if($admin_role == 'Admin'){
				?>
				<ul id="accordion-menu">
                    <li class="dropdown">
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
						
                    </li>
                    
                    <!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user"></span><span class="mtext">User</span>
						</a>
						<ul class="submenu">
							<li><a href="user.php">Register User</a></li>
							<li><a href="mng_user.php">Manage User</a></li>
						</ul>
					</li> -->

                    
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Customer</span>
						</a>
						<ul class="submenu">
							<li><a href="Invoice.php">Invoice</a></li>
							<li><a href="Receipt.php">Recipts</a></li>
							<!-- <li><a href="test.php">Test Sms send</a></li>

							<li><a href="test2.php"> Hormud Sms send</a></li> -->
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
							<li><a href="Account_Reg.php">Account Registration</a></li>
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
							<li><a href="financial_report2.php">Financial Report 2</a></li>
							<li><a href="Cust_Report.php">Customer Report</a></li>
                            <li><a href="Supplier_report.php">Suppliers Report</a></li>
						</ul>
					</li>

					<li>
						<div class="dropdown-divider"></div>
					</li>

					<li>
						<div class="sidebar-small-cap">Extra</div>
					</li>

				
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Customer Info</span>
						</a>
						<ul class="submenu">
							<li><a href="All_order.php">Orders</a></li>
							<li><a href="All_Support.php">Support</a></li>												
						</ul>
					</li>
					
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Debt Reminder</span>
						</a>
						<ul class="submenu">
							<li><a href="mng_debt_reminder.php">Manage debt reminder</a></li>
						</ul>
					</li> -->
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Support</span>
						</a>
						<ul class="submenu">
							
							<li><a href="All_Support.php">All Support</a></li>
						</ul>
					</li> -->
                    <!-- <li class="dropdown">
						<a href="video.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-eye"></span><span class="mtext">Video</span>
						</a>						
                    </li> -->
			
				</ul>
				<?php } 








					//  ADMINISTRATOR 
				elseif($admin_role == 'Administrator'){
				?>
					<ul id="accordion-menu">
                    <li class="dropdown">
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
						
                    </li>
                    
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user"></span><span class="mtext">User</span>
						</a>
						<ul class="submenu">
							<li><a href="user.php">Register User</a></li>
							<li><a href="mng_user.php">Manage User</a></li>
							<li><a href="user_send_email.php">Send Email</a></li>
							<li><a href="user_send_reset_password.php">Send Reset Password</a></li>
							<li><a href="user_info_individual.php"> User info</a></li>
						</ul>
					</li>

                    
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Customer</span>
						</a>
						<ul class="submenu">
							<li><a href="Invoice.php">Invoice</a></li>
							<li><a href="Receipt.php">Recipts</a></li>
							<!-- <li><a href="test.php">Test Sms send</a></li>

							<li><a href="test2.php"> Hormud Sms send</a></li> -->
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
							<li><a href="Account_Reg.php">Account Registration</a></li>
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
							<li><a href="financial_report2.php">Financial Report 2</a></li>
							<li><a href="Cust_Report.php">Customer Report</a></li>
                            <li><a href="Supplier_report.php">Suppliers Report</a></li>
						</ul>
					</li>

					<li>
						<div class="dropdown-divider"></div>
					</li>

					<li>
						<div class="sidebar-small-cap">Extra</div>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Requested </span>
						</a>
						<ul class="submenu">
							<li><a href="Requested.php"> Customers</a></li>
							<li><a href="feedback_req.php"> Feedback</a></li>						
						</ul>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Customer Info</span>
						</a>
						<ul class="submenu">
							<li><a href="All_order.php">Orders</a></li>
							<li><a href="All_Support.php">Support</a></li>
							<li><a href="Web_contact.php">Web Contact</a></li>
						
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Transection Details</span>
						</a>
						<ul class="submenu">
							<li><a href="javascript:;" class="dropdown-toggle">Cust Inv & Receipt</a>
								<ul class="submenu">
									<li><a href="T_invoice_detail.php">Invoice Details</a></li>
									<li><a href="T_Receipt_detail.php">Receipt Details</a></li>
								</ul>
							</li>
							<li><a href="javascript:;" class="dropdown-toggle">Ven Inv & Payment</a>
								<ul class="submenu">
									<li><a href="T_ven_invoice_detail.php">Vendor Invoice Details</a></li>
									<li><a href="T_ven_payment_detail.php">Vendor Payments Details</a></li>
								</ul>
							</li>
							<li><a href="javascript:;" class="dropdown-toggle">Cash On Hand</a>
								<ul class="submenu">
									<li><a href="T_cash_in_detatil.php">Cash In Details</a></li>
									<li><a href="T_cash_out_detail.php">Cash Out Details</a></li>
								</ul>
							</li>




							<!-- <li><a href="Receipt_detail.php">Receipt Details</a></li> -->
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Debt Reminder</span>
						</a>
						<ul class="submenu">
							<li><a href="mng_debt_reminder.php">Manage debt reminder</a></li>
						</ul>
					</li>
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Support</span>
						</a>
						<ul class="submenu">
							
							<li><a href="All_Support.php">All Support</a></li>
						</ul>
					</li> -->
					
                    <!-- <li class="dropdown">
						<a href="video.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-eye"></span><span class="mtext">Video</span>
						</a>						
                    </li>
					<li class="dropdown">
						<a href="chat.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-eye"></span><span class="mtext">Chating</span>
						</a>						
                    </li> -->
			
				</ul>
				<?php } ?>	


				
			</div>
		</div>
	</div>
	<!-- Lesft Slide Bar End -->
