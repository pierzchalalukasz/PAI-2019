<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <link rel="Stylesheet" type="text/css" href="Public/css/navbar.css" />
    <link rel="Stylesheet" type="text/css" href="Public/css/admin.css" />
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="Public/js/navbar.js"></script>
    <script src="Public/js/app.js"></script>
    <title>Wallet Stats | Admin Panel</title>
</head>
<body>
    <?php include(dirname(__DIR__).'/Common/navbar.php'); ?>
    
    <div class="my-container">
        <div class="panel-wrapper">
            <h1>My Profile</h1>
            <?php if(!isset($details))  {
                    die("<h2>You haven't added these informations to your profile yet.<h2>");
            } ?>
            <div class="col-13">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Username</th>
                            <th scope="col">Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"><?= $details->getId(); ?></th>
                            <td><?= $details->getName(); ?></td>
                            <td><?= $details->getSurname(); ?></td>
                            <td><?= $details->getUsername(); ?></td>
                            <td><?= $details->getPhoneNumber(); ?></td>
                        </tr>
                </table>
                <button id="btn-admin" class="btn-small" type="button">
                    EDIT DATA    
                </button>
            </div>
            </div>
    </div>
</body>
</html>