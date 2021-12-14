<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periodic Table</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
    <h1 class="page-header text-center" style="margin-top: 50px; margin-bottom: 25px;">Periodic Table</h1>
    <div class="container mt-2">
        <div class="row">
            <div class="" style="height:550px" col-sm-8 col-sm-offset-2>
                <br>
                <br>
                <?php 
                    session_start();
                    if(isset($_SESSION['message'])){
                        ?>
                        <div class="alert alert-info text-center" id="alert-info" style="margin-top:10px;">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                        <?php

                        unset($_SESSION['message']);
                    }
                ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>No.</th>
                            <th>Element Name</th>
                            <th>Atomic Number</th>
                            <th>Element Type</th>
                            <th>Atomic Weight</th>
                            <th>Description</th>
                        </thead>
                        <tbody>
                        <?php
                            //include our connection
                            include_once('include/database.php');
                            $group_dict = [];
                            $database = new Connection();
                            $db = $database->open();
                            try{	
                                $sql = 'SELECT * FROM elements';
                                foreach ($db->query('SELECT * FROM element_group') as $row) {
                                    $group_dict[$row['id']] = $row['name'];
                                }
                                $no = 0;
                                foreach ($db->query($sql) as $row) {
                                    $no++;
                        ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['atomic_no']; ?></td>
                                        <td><?php echo $group_dict[$row['group_id']]; ?></td>
                                        <td><?php echo $row['atomic_weight']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td align="right">
                                            <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit_element<?php echo $row['id']; ?>">Edit</a>
                                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_element<?php echo $row['id']; ?>">Delete</a>
                                        </td>
                                        <?php include('elements/view_edit_element.php'); ?>
                                        <?php include('elements/view_delete_element.php'); ?>
                                    </tr>
                        <?php 
                                }
                            }
                            catch(PDOException $e){
                                echo "There is some problem in connection: " . $e->getMessage();
                            }

                            //close connection
                            $database->close();

                        ?>
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_elements">Add New Element</a>
            </div>
        </div>
    </div>
    <?php include('elements/view_add_elements.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<footer>
    <h3 class="text-center" style="font-size: 15px">
        Arnel Maala<br>
    </h3>
</footer>
</html>