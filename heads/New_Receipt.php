<?php include('includes/header.php')?>
<?php include('../database/session.php')?>
<?php include('../database/db.php')?>

<body>
	<?php include('includes/navbar.php')?>
	<?php include('includes/right_sidebar.php')?>
	<?php include('includes/left_sidebar.php')?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>New Receipt </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">New Receipts for customer</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="card-box mb-30">
					<div class="pd-20">
						<h2 class="text-blue h4">New Customer Receipts</h2>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>NO#</th>
									<th class="table-plus">Customer Name</th>								
									<th>Receipt No#</th>
									<th>Date </th>
									<th>Memo</th>
									<th>Amount</th>
									<th>Status</th>						
									<th class="datatable-nosort">ACTION</th>
								</tr>
							</thead>


                            <tbody>
                                <?php                               
                                $sql = "SELECT user.Name, user.Com_name,  receipt.id, receipt.Cid,receipt.RV ,receipt.Amount,receipt.Date,receipt.Memo,receipt.Status,receipt.File FROM receipt INNER JOIN user ON   receipt.Cid=user.ID Where receipt.Status='Pending' order by receipt.Date Desc ";                           
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                foreach($results as $result)
                                {               ?>  

                                <tr>
                                    <td> <?php echo htmlentities($cnt);?></td>
                                    <td><?php echo htmlentities($result->Com_name);?></td>
                                    <td><?php echo htmlentities($result->RV);?></td>
                                    <td><?php echo htmlentities($result->Date);?></td>	
                                    <td><?php echo htmlentities($result->Memo);?></td>
                                    <td ><?php echo "$ ". number_format((float)htmlentities($result->Amount), '2','.',','); ?></td>

                                	<td><?php $stats=($result -> Status);
									if($stats=="Pending"){
									?>
									<span class="badge badge-primary">Pending</span>
										<!-- <span style="color: green">Pending</span> -->
										<?php } if($stats=="Approved")  { ?>
											<span class="badge badge-success">Approved</span>
										<?php } if($stats=="Rejected")  { ?>
											<span class="badge badge-danger">Rejected</span>
										<?php } 
									?>
									</td>	
                                    
                                    <td>
                                        <div class="table-actions">										
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="edit_receipt.php?edit=<?php echo  htmlentities($result->id); ?>"><i class="dw dw-eye"></i> View</a>
                                                    
                                                </div>
                                            </div>                                    
                                        </div>
                                    </td>
                                </tr>
                                <?php $cnt++;} }?>  
                            </tbody>
						</table>						
					</div>
				</div>
			</div>			
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts2.php')?>

</body>
</html>