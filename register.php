<?php
ob_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Register Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="animations.css">
</head>

<body class="position-relative">
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

    <div class="container-sm appear" style="display: grid; place-items:center; padding-top: 10vh;">
        <div class="row">
            <div class="col">
                <form class="d-flex flex-column p-5 shadow-lg rounded" action="register.php" method="post">
                    <label>
                        <h1 class="mb-4">Register Account</h1>
                    </label>
                    <label class="justify-content-start d-flex mx-2" for="email">Email</label>
                    <input class="m-2" type="text" name="email" placeholder="@gmail" required>
                    <label class="justify-content-start d-flex mx-2" for="password">Password</label>
                    <input class="m-2" type="password" name="password" placeholder="Password" required>
                    <label class="justify-content-start d-flex mx-2" for="password">Confrim Password</label>
                    <input class="m-2" type="password" name="confirmpassword" placeholder="ConfirmPassword" required>
                    <button class="m-2 btn btn-secondary border-0" class="m-2" type="submit" name="submit" value="submit">Register</button>
                    <?php
                    if (!empty($_POST['submit'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $ConfirmPassword = $_POST['confirmpassword'];
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                            include("connection.php");
                            $search = "SELECT email FROM users WHERE email = '$email'";
                            $result = mysqli_query($connection, $search);
                            if($row = mysqli_fetch_assoc($result) > 0){
                                print "<p class='text-danger'>Email Already Exist</p>";
                            }else{
                                if($password != $ConfirmPassword){
                                    print "<p class='text-danger>Passwords don't match</p>";
                                }else{
                                    $hashed = password_hash($password, PASSWORD_DEFAULT);
                                    $query = "INSERT INTO users(email, password) values('$email','$hashed')";
                                    $result = mysqli_query($connection, $query);
                                    print "<p class='text-success'>Account Registered</p>";
                                }
                            }
                        }
                        else{
                            print "<p class='text-danger'>Invalid Email Format</p>";
                        }
                    }
                    ?>
                    <a href="login.php" class="m-2 text-success">Already have an Account?</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>