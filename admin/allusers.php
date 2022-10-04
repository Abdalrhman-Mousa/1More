
                
                <?php 

include "layout\head.php"

?>

    <!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<?php
include "layout\header.php"

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php
require_once "backend/connection.php";
require_once "backend/functions.php";

?>

<div class="container-fluid px-4">
                        <h1 class="mt-1">All Users Data</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
</div>


<?php 

include "./backend/users.php"

?>
                    <!-- Page Heading -->

                </div>
                <!-- /.container-fluid -->

            <!-- End of Main Content -->

            <?php 

include "layout/footer.php"

?>
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
