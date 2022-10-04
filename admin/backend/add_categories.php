<?php 
require_once "connection.php";
include_once "functions.php";

?>



<?php add_category(); ?>


<div class="container">
  <div class="row">
    <div class="col">
    <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="category-title">Title</label>
        <input name="name" type="text" class="form-control" style="width:75% ;">
    </div>
<div><br></div>
    <div class="form-group">
    <label for="Category image">Category Image</label>
    <input type="file" name="file">
  
</div>

<div><br></div>


    <div class="form-group">
        
        <input name="submit" type="submit" class="btn btn-primary" value="Add Category">
    </div>      
</form>
</div>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Categories Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                              <thead>
                <tr>
            <th>id</th>
            <th>Category Name</th>
            <th> Image</th>
            <th>Action</th>
        </tr>
            </thead>


    <tbody>
       <?php show_categories_in_admin(); ?>
    </tbody>

        </table>    </div>
  </div>


