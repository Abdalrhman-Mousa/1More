<?php
function query($sql) {

    global $connection;
    
    return mysqli_query($connection, $sql);
    
    
    }
    

function add_product() {

 include "connection.php";

if(isset($_POST['publish'])) {


$name           = ($_POST['name']);
$price          = ($_POST['price']);
$category_id    = ($_POST['category_id']);
$description    = ($_POST['description']);
$image          = ($_FILES['file']['name']);
$image_temp_location = ($_FILES['file']['tmp_name']);
$folder = 'img/';
$target = "img/".basename($image);
move_uploaded_file($image_temp_location , $folder.$image);




$sql = ("INSERT INTO products(`name` , `price`, `description` , `category_id`,`image`) 

VALUES('$name','$price', '$description','$category_id','$image')");

$result = mysqli_query($conn, $sql);
if($result){


    echo ("<script>location.href='allproducts.php'</script>");

}else{
    echo "Data not inserted";
}


        }


}

function show_categories_add_product_page(){

    include "connection.php";


$sql = ("SELECT * FROM categories");
$categories = mysqli_query($conn, $sql);
$results =  mysqli_fetch_all($categories,MYSQLI_ASSOC);
// print_r($results);
return $results;
// die;


?>

    <!-- <?php
    //foreach ($categories as $category) {
    ?>
        <option value="<?php //echo $category['id'] ?>"><?php //echo $category['name'] ?></option>
    <?php //} ?>
</select> -->
</div>

<?php } ?>


<?php 

function add_category() {

    global $conn;

    if(isset($_POST['submit'])) {

    $name =($_POST['name']);
    $image = ($_FILES['file']['name']);
    $image_temp_location = ($_FILES['file']['tmp_name']);
    $folder = 'img/';
    $target = "img/".basename($image);
    move_uploaded_file($image_temp_location , $folder.$image);
        
    $sql = ("INSERT INTO categories (`name` , `image`)
     VALUES('$name' , '$image' )");
    $result = mysqli_query($conn, $sql);
    if($result){
        // header('Location: .\AddCategories.php');
    }else{
        echo "Data not inserted";
    }
        
    
        }
    
    
    }



    function show_categories_in_admin() {

        global $conn ;

        $sql = ("SELECT * FROM categories");
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
        
        $id = $row['id'];
        $name = $row['name'];
        $image =$row['image'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td> <img src=img/'.$image.' style= width:50px; hieght:50px; > </td>
       <td> 
       <a href="EditCategory.php?id='.$id.'"class="btn btn-warning btn-circle"> <i class="far fa-edit"></i></a>
       <a href="./backend/Delete_Category.php?id='.$id.'"class="btn btn-danger btn-circle"> <i class="fas fa-trash"></i></a></tr>';

        
            }
        
        
        
        }
        
        function Count_number_of_row_orders () {
            global $conn ;

        $sql = ("SELECT * FROM orders");
        if ($result = mysqli_query($conn, $sql)) {

            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );  
            echo $rowcount  ;    
        }
    }


    function Count_number_of_pending_orders () {
        global $conn ;

    $sql = ("SELECT * FROM orders WHERE status= 'pending'");
    if ($result = mysqli_query($conn, $sql)) {

        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );  
        echo $rowcount  ;    
    }
}


function Count_number_of_completed_orders () {
    global $conn ;

$sql = ("SELECT * FROM orders WHERE status= 'completed'");
if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );  
    echo $rowcount  ;    
}
}

function Count_number_of_rejected_orders () {
    global $conn ;

$sql = ("SELECT * FROM orders WHERE status= 'rejected'");
if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );  
    echo $rowcount  ;    
}
}

function Count_number_of_in_delviery_orders () {
    global $conn ;

$sql = ("SELECT * FROM orders WHERE status= 'in_delviery'");
if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );  
    echo $rowcount  ;    
}
}

function Count_number_of_pick_up_orders () {
    global $conn ;

$sql = ("SELECT * FROM orders WHERE status= 'pick_up'");
if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );  
    echo $rowcount  ;    
}
}

function Count_number_of_row_subscriber () {
    global $conn ;

$sql = ("SELECT * FROM newsletter");
if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );  
    echo $rowcount  ;    
}
}

function Count_number_of_row_reviews () {
    global $conn ;

$sql = ("SELECT * FROM reviews");
if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );  
    echo $rowcount  ;    
}
}


function Count_number_of_row_products () {
    global $conn ;

$sql = ("SELECT * FROM products");
if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );  
    echo $rowcount  ;    
}
}

function Count_number_of_row_users () {
    global $conn ;

$sql = ("SELECT * FROM users");
if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );  
    echo $rowcount  ;    
}
}






function sum_all_orders () {
    global $conn ;

    $sql = ("SELECT sum(total_price) from bill");
    if ($result = mysqli_query($conn, $sql)) {

    $row = mysqli_fetch_array($result);
    
    echo $row[0].'JOD';
    
}
}


function sum_lastmonth_orders () {
    global $conn ;
    

    $sql = ("SELECT date(date_ordered),sum(total_price) 
    from bill  WHERE date_ordered > now() - INTERVAL 1 month ");
    if ($result = mysqli_query($conn, $sql)) {

    $row = mysqli_fetch_array($result);
    
    echo $row[1].'JOD';
    
}
}

function sum_annual_orders () {
    global $conn ;
    

    $sql = ("SELECT date(date_ordered),sum(total_price) 
    from bill  WHERE date_ordered > now() - INTERVAL 12 month ");
    if ($result = mysqli_query($conn, $sql)) {

    $row = mysqli_fetch_array($result);
    
    echo $row[1].'JOD';
    
}
}

function sum_today_orders () {
    global $conn ;
    $year = date("Y");
    $month = date("m");
    $day = date("d");



    $sql = ("SELECT sum(total_price) 
    from bill  WHERE day(date_ordered) =$day &&  month(date_ordered) =$month &&  year(date_ordered) =$year");
    if ($result = mysqli_query($conn, $sql)) {

    $row = mysqli_fetch_array($result);
    
    echo $row[0].'JOD';
    }
}

function avg_annual_orders () {
    global $conn ;
    

    $sql = ("SELECT sum(total_price) from bill ");
    if ($result = mysqli_query($conn, $sql)) {

    $row = mysqli_fetch_array($result);
    $year=12;
    
    echo ($row[0]/$year).'JOD';
    
}
}

