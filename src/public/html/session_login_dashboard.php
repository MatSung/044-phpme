<?php

function redirectToLogin($reason)
{
    header("Location: session_login.php?reason=$reason");
    die();
}

function destroySession()
{
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    session_destroy();
}

function logout()
{
    destroySession();
    redirectToLogin('logout');
}

function login($users)
{
    if (isset($_SESSION['user'])) {

        return true;
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        foreach ($users as $key) {
            if ($key['username'] === $_POST['username']) {
                if ($key['password'] === $_POST['password']) {
                    $_SESSION['user'] = $key['username'];
                    $_SESSION['timestamp'] = time();
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
    return false;
}

session_start();

if (isset($_POST['logout'])) {
    logout();
}

$users = file_get_contents('../../json/users.json');
$users = json_decode($users, TRUE);
$users = $users['users'];

if (!login($users)) {
    destroySession();
    redirectToLogin('failed');
}

for ($i = 0; $i < count($users); $i++) {
    if ($users[$i]['username'] === $_SESSION['user']) {
        $data = $users[$i];
        break;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Welcome</h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $_SESSION['user']; ?></h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php var_dump($data) ?></li>
                    <li class="list-group-item">Last login: <?php echo $_SESSION['timestamp'] ?></li>
                </ul>
            </div>
            <div class="card-footer">
                <form action="session_login_dashboard.php" method='POST'>
                    <button class='btn btn-danger' name='logout'>Logout</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>