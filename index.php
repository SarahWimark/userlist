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
                                    <td>Name</td>  
                                    <td>Email</td>  
                                    <td>Created at</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          foreach($users as $user)  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$user["name"].'</td>  
                                    <td>'.$user["email"].'</td>  
                                    <td>'.$user["created"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>    
</body>
</html>