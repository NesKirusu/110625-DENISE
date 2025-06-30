<?php
ob_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <style>
        body * {
            text-align: center;
        }
    </style>
    <div class="container-fluid" style="display: grid; place-items:center; height: 100%;">
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
                        $query = "SELECT EMAIL,PASSWORD FROM users WHERE email = '$email' AND password = '$password'";
                        $result = mysqli_query($connection, $query);
                        if ($row = mysqli_fetch_assoc($result)) {
                            session_start();
                            $_SESSION['email'] = $email;
                            header("location: user.php");
                            exit();
                        } else {
                            print "<p class='text-danger'>Incorrect Username Or Password</p>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>