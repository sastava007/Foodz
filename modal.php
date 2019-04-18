<!-- Add Product -->
<?php
//session_start();
?>
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h3 class="modal-title" id="myModalLabel" style="background-color:  #D70F64; color: white; height: 3vw; padding-top: 0.8vw;"><b>Add New Product</b></h3></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="addproduct.php" enctype="multipart/form-data">

                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Product Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="pname" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                      <label class="col-md-3 control-label" for="product_description" style="margin-top:7px;">PRODUCT DESCRIPTION</label>
                      <div class="col-md-9">                     
                        <textarea class="form-control" id="product_description" name="description"></textarea>
                      </div>
                  </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Category:</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control" name="category">
                                    <?php
                                       
                                         $sql=mysqli_query($conn,"SELECT DISTINCT category FROM menu");
                                        
                                        while($row=mysqli_fetch_assoc($sql))
                                        {
                                            
                                            echo "<option value='".$row['category.']."'>".$row['category']."</option>";
                                            
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Price:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="price" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Photo:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="photo">
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-primary" style='background-color:#D70F64; border-color:#D70F64;'><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Add Category -->
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Category</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="addcategory.php" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Category Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="cname" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
