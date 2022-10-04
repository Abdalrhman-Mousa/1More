<?php
require_once "PDOConnection.php";
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                              <thead>
                <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email </th>
                <th>Password </th>
                <th>role</th>
                <!-- <th>Edit</th> -->
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $insert = $conn->prepare("SELECT * FROM users ");
            $insert->execute();
            $results = $insert->fetchAll(PDO::FETCH_OBJ);
            foreach ($results as $result) {
            ?>
                <tr>
                    <td><?php echo htmlentities($result->f_name); ?></td>
                    <td><?php echo htmlentities($result->l_name); ?></td>
                    <td><?php echo htmlentities($result->email); ?></td>
                    <td><?php echo htmlentities($result->password); ?></td>
                    <td><?php echo htmlentities($result->role); ?></td>
                    <td><a href="updateuser.php?id=<?php echo htmlentities($result->id); ?>"class="btn btn-warning btn-circle"> <i class="far fa-edit"></i></a>
                    <a href="allusers.php?del=<?php echo htmlentities($result->id); ?>"class="btn btn-danger btn-circle"> <i class="fas fa-trash"></a></td>

                </tr>
            <?php } ?>
        </tbody>
        </table>

    <?php
    // Code for record deletion
if (isset($_REQUEST['del'])) {
    //Get row id
    $id = $_GET['del'];
    //Qyery for deletion
    $sql = "DELETE FROM users WHERE id='$id'";
    // Prepare query for execution
    $query = $conn->prepare($sql);
    // Query Execution
    $query->execute();
    // Mesage after updation
    echo "<script>alert('Record Updated successfully');</script>";
    // Code for redirection
    // echo "<script>window.location.href='http://localhost/formvvvvv/login.php'</script>";
}
    ?>