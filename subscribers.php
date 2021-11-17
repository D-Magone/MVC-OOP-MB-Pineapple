<?php
require_once("init.php");
global $session;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/table.css">
    <title>Document</title>
</head>
<body>

<!-- Page Heading -->
<div>
    <div>
        <!-- <form action="" id="search_form" method="POST">
            <input type="text" name="search_user" id="input_search" placeholder="Input search term here..">
        </form> -->
        <div>
            <table id="output" class="table-style table-hover">
                <thead class="thead-style">
                    <tr>
                        <th>Id</th>
                        <th>Email
                            <div>
                                <form action="" method="POST">
                                    <input type="hidden" name="email_provider" value="<?php echo unserialize($_SESSION['email_provider']);?>">
                                    <input type="hidden" name="column" value="email">
                                    <input type="submit" name="ascending" value="Asc">
                                    <input type="submit" name="descending" value="Desc">
                                </form>
                            </div>
                        </th>
                        <th>Create Date
                            <div>
                                <form action="" method="POST">
                                    <input type="hidden" name="email_provider" value="<?php echo unserialize($_SESSION['email_provider']);?>">
                                    <input type="hidden" name="column" value="create_time">
                                    <input type="submit" name="ascending" value="Asc">
                                    <input type="submit" name="descending" value="Desc">
                                </form>
                            </div>
                        </th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="tbody-style">
                    <?php 
                    
                    $view_subscribers = new Controller();
                    
                    ?>
                </tbody>
            </table> <!-- End of table -->

            <div>
                <a href='subscribers.php'>All subscribers</a>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <script src="js/main.js"></script>
        