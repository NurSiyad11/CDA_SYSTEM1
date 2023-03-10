<?php //include('includes/header.php')?>
<?php //include('../database/session.php')?>
<?php //include('../database/db.php')?>

  <?php $get_id = $_GET['edit']; ?>
  <!-- UPDATE FAQ  modal -->
  <div class="col-md-4 col-sm-12 mb-30">				
                <div class="modal fade" id="Update-faq-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Update Frequently Asked Question</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>                                    
                            <div class="modal-body">
                                <?php
                                    $query = mysqli_query($conn,"select * from faq where id='$get_id' ") or die(mysqli_error());
                                    $row = mysqli_fetch_array($query);
                                    ?>

                                <form id="add-event" method=post>
                                    <div class="modal-body">                                      
                                        
                                        <div class="form-group">
                                            <label>Question</label>
                                            <input name="Question" class="form-control" type="text" placeholder="Enter The Question" autocomplete="off" required  value="<?php echo $row['Question']?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="Description" placeholder="Enter The Description FAQ" required autocomplete="off" ></textarea>
                                        </div>
                                        <!-- <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Status :</label>
                                                <select name="Status" class="custom-select form-control" required="true" autocomplete="off">
                                                    <option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
                                                
                                                    <option value="Show">Show</option>
                                                    <option value="Hide">Hide</option>
                                                </select>
                                            </div>
                                        </div>	 -->
                                        
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Link Video</label>
                                                <input name="Video" placeholder="Enter The Video Link" class="form-control" type="text">
                                            </div>
                                        </div>	
                                        <?php 
                                        // $query2 = mysqli_query($conn,"select * from faq ")or die(mysqli_error());
                                        // $count_no = mysqli_num_rows($query2);  
                                        // $count_no_1 = $count_no +1;
                                        ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ordered No#</label>
                                                <input name="Order_no" placeholder="Enter The Order No#" class="form-control" type="text"  value="<?php echo ($count_no_1)?>" >
                                            </div>
                                        </div>	
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="Add_Faq" class="btn btn-primary" >Update FAQ </button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>					
            </div>