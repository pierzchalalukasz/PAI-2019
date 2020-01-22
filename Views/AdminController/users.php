<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="Public/js/navbar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <link rel="Stylesheet" type="text/css" href="Public/css/navbar.css" />
    <link rel="Stylesheet" type="text/css" href="Public/css/admin.css" />
    <script src="Public/js/app.js"></script>
    <title>Wallet Stats | Admin Panel</title>
</head>
<body>
    <?php include(dirname(__DIR__).'/Common/navbar.php'); 
    if(!in_array('ROLE_ADMIN', $_SESSION['role'])) {
        die('<h2>You do not have permission to watch this page!</h2>');
    }
    ?>

    <div class="my-container">
        <div class="panel-wrapper">
            <h1>Admin Panel</h1>
            <div class="col-13">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"><?= $user->getId(); ?></th>
                            <td><?= $user->getEmail(); ?></td>
                            <td><?= $user->getName(); ?></td>
                            <td><?= $user->getSurname(); ?></td>
                            <td><?= $user->getUsername(); ?></td>
                            <td><?php if(in_array('ROLE_ADMIN', $_SESSION['role'])) {
                                    echo "ROLE_ADMIN";
                                } else  {
                                    echo "ROLE_USER";
                                }
                                ?>
                            </td>
                            <td>--------------</td>
                        </tr>
                    </tbody>
                    <tbody class="users-list">
                    </tbody>
                </table>
                <button id="btn-admin" class="btn-small" type="button" onclick="getUsers()">
                    GET ALL USERS    
                </button>
            </div>
            </div>
    </div>
</body>
</html>