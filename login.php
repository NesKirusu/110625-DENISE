<?php
ob_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="animations.css">
</head>

<body class="position-relative">
    <style>
        body * {
            text-align: center;
        }
    </style>

    <!-- BG -->
    <style>
        .square {
            position: relative;
            width: 100%;
            aspect-ratio: 1;
            border: 2px solid black;
            margin: 30px;
            transform: rotate(45deg);
        }
        .square::after {
            position: absolute;
            content: '';
            top: 0;
            width: 100%;
            aspect-ratio: 1;
            border: 2px solid green;
            margin: 30px;
            transform: translate(-100%, 100%);
        }
        .square:hover {
            scale: 110%;
        }
    </style>
    <div class="container-fluid position-absolute" style="z-index: -1; overflow: hidden; height: 100%;">
        <div class="row" style="scale: 110%;">
            <?php
            $count = 100;
            $ctr = 1;
            while ($ctr <= $count) {
                print '
                    <div class="col-1 d-flex">
                        <div class="square"></div>
                    </div>
                    ';
                $ctr++;
            }
            ?>
        </div>
    </div>
    <!-- BG -->

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
                    <button class="m-2 btn btn-secondary border-0" class="m-2" type="submit" name="submit"
                        value="submit">Login</button>
                    <?php
                    if (!empty($_POST['submit'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        include("connection.php");

                        $query = "SELECT email, password, user_type FROM users WHERE email = '$email'";
                        $result = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $hashed = $row['password'];
                            $user_type = $row['user_type'];

                            if (password_verify($password, $hashed)) {
                                session_start();
                                $_SESSION['email'] = $email;
                                $_SESSION['user_type'] = $user_type;

                                if ($user_type === 'customer') {
                                    header("location: user.php");
                                } else {
                                    header("location: admin.php");
                                }
                                exit();
                            } else {
                                print "<p class='text-danger'>Incorrect Username Or Password</p>";
                            }
                        }
                    }
                    ?>

                    <a href="register.php" class="m-2 text-success">Don't have an Account?</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>