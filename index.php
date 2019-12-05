<?php require('config/db.php'); 
   // Open a connection to the database
    $conn = OpenConnection();

    // Create a query to get the users in the users table
    $query = 'SELECT * FROM users';

    // Get the result of the query
    $result = mysqli_query($conn, $query);

    // Fetch the users data
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    //Free the result
    mysqli_free_result($result);

    CloseConnection($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Userlist</title>
</head>

<body>
    <div class="container">
        <h3>Userlist</h3>
        <br />
        <div class="table-responsive">
            <table id="userInfo" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td></td>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Created at</td>
                    </tr>
                </thead>
                <?php  
                          // Crate a table row for each user in the database
                          foreach($users as $user)  
                          {  
                               echo '  
                               <tr>  
                                    <td><button class="infoBtn btn btn-primary" data-target="#myModal">User Details</button></td>  
                                    <td>'.$user["id"].'</td>  
                                    <td>'.$user["name"].'</td>  
                                    <td>'.$user["email"].'</td>  
                                    <td>'.$user["created"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>
            </table>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="modalTitle">User Info</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Id: </strong><span id="userid"></span></p>
                        <p><strong>Name: </strong><span id="name"></span></p>
                        <p><strong>Email: </strong><span id="email"></span></p>
                        <p><strong>Created at: </strong><span id="created"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

    </div>

    <script>
        // Initialize the datatable
        $(document).ready(function () {
            const dataTable = $('#userInfo').DataTable();

            // Get userinfo from clicked row and show in modal
            $('#userInfo').on('click', 'button', function () {
                const clickedRow = dataTable.row($(this).closest('tr'));

                const user = {
                    id: clickedRow.data()[1],
                    name: clickedRow.data()[2],
                    email: clickedRow.data()[3],
                    created: clickedRow.data()[4]
                }

                $('#userid').text(user.id);
                $('#name').text(user.name);
                $('#email').text(user.email);
                $('#created').text(user.created);
                $('#myModal').modal('toggle');
            });
        });
    </script>
</body>

</html>