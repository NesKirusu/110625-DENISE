<?php
ob_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="animations.css">
</head>

<body>
    <style>
        body * {
            text-align: center;
        }
    </style>
    <div class="row w-100 py-5 bg-dark">
        <div class="col">
            <h1 class="text-danger">KEVI MOTORS</h1>
        </div>
    </div>
    <div class="container-fluid appear" style="display: grid; place-items:center; padding-top: 10vh;">
        <div class="row">
            <div class="col">
                <form class="d-flex flex-column p-5 shadow-lg rounded" action="login.php" method="post">
                    <label>
                        <h1 class="mb-4">Login</h1>
                    </label>
                    <label class="justify-content-start d-flex mx-2" for="email">Email</label>
                    <input class="m-2" type="text" name="email" placeholder="@gmail" required>
                    <label class="justify-content-start d-flex mx-2" for="password">Password</label>
                    <input class="m-2" type="password" name="password" placeholder="Password" required>
                    <button class="m-2 btn btn-secondary border-0" class="m-2" type="submit" name="submit" value="submit">Login</button>
                    <?php
                    if (!empty($_POST['submit'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        include("connection.php");
                        $query = "SELECT EMAIL,PASSWORD FROM users WHERE email = '$email'";
                        $result = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $hashed = $row['password'];
                        }
                        if(password_verify($password, $hashed)){
                            session_start();
                            $_SESSION['email'] = $email;
                            header("location: user.php");
                            exit();
                        }else {
                        print "<p class='text-danger'>Incorrect Username Or Password</p>";
                        }
                    }
                    ?>
                    <a href="register.php" class="m-2 text-success">Don't have an Account?</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>