<?php 
require_once "connection.php"
?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>category_id</th>
                                            <th>image</th>
                                            <th>Name</th>
                                            <th>description</th>
                                            <th>price</th>
                                            <th>discount</th>
                                            <th>date added</th>
                                            <th>action</th>


                                        </tr>
                                    </thead>






                                  <?php

$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);
  if ($result){

    while($row = mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $category_id=$row['category_id'];
        $image=$row['image'];      
        $name=$row['name'];
        $description=$row['description'];
        $price=$row['price'];
        $discount=$row['discount'];
        $date_added=$row['date_added'];


        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$category_id.'</td>
        <td> <img src=./img/'.$image.' style= width:75px; > </td>
        <td>'.$name.'</td>
        <td>'.$description.'</td>
        <td>'.$price.'</td>
        <td>'.$discount.'</td>
        <td>'.$date_added.'</td>
        

        <td>
        <a href="./EditProduct.php?id='.$id.'" class="btn btn-warning btn-circle"> <i class="far fa-edit"></i></a>
        <a href="./backend/Delete_product.php?id='.$id.'" class="btn btn-danger btn-circle"> <i class="fas fa-trash"></i></a>


      </tr>';

}
  }

  ?>
</table>


                            </div>
                        </div>
                    </div>

                
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


<!-- <div class="pagenation" style="margin-left:225px ;">
<?php

// for($btn=1;$btn<=$totalpages;$btn++){

// echo '<a href="allproducts.php?page='.$btn.'" class="btn btn-light my-5 mx-1 " >'.$btn.'</a>';

// }
?>
</div> -->