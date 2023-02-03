<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: ?page=session_login_dashboard");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<style>
    body {
        margin-top: 20px;
    }
</style>

<body>
    <div class="container">
        <div class="card my-2">
            <div class="card-header">
                Login (user1 password, user2 password, user3 password)
            </div>
            <div class="card-body">
                <form action="?page=session_login_dashboard" method="post">
                    <div class="mb-3 row">
                        <label for="username-input" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" required name="username" placeholder="username" class="form-control" id="username-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password-input" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" required name="password" placeholder="password" class="form-control" id="password-input">
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" id="submit-button" type="submit">Login</button>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_GET['reason'])) {

            ?>
                <div class="card-footer">
                    <span class='text-danger'>
                        <?php
                        if ($_GET['reason'] == 'logout') {
                            echo 'Logout successful';
                        } else {
                            echo 'Login failed, please try again';
                        }
                        ?>
                    </span>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
</body>

</html>