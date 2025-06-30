<?php
ob_start();
session_start();
if (empty($_SESSION['email'])) {
    print "Login First";
    print
        '<script>
            setTimeout(function() {
                window.location.href = "login.php";
            }, 5000); // 5000ms = 5 seconds
          </script>';

    exit();
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Kevi Motors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
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
        <div class="col">
            <form action="user.php" method="post">
                <a href="view_orders.php" class="btn btn-secondary">Orders</a>
                <button class="btn btn-danger" type="submit" name="logout" value="logout">Log Out</button>
            </form>
            <?php
            if (!empty($_POST['logout'])) {
                session_destroy();
                header('location: login.php');
                exit();
            }
            ?>
        </div>
    </div>
    <div class="container-sm align-items-center d-flex flex-column mt-5">
        <div class="row shadow-lg p-3">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/tesla1.jpg" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>TESLA MODEL X</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>2000000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=Tesla model X & price=2000000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/tesla2.jpg" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>TESLA MODEL Y</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>2500000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=Tesla model Y & price=2500000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/images.jfif" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>TESLA MODEL C</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>2100000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=Tesla model C & price=2100000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/images2.jfif" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>CYBERTRUCK</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>3000000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=Tesla model X & price=2000000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/images3.jfif" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>TESLA TRUCK</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>10000000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=Tesla TRUCK & price=10000000">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-sm align-items-center d-flex flex-column mt-5">
        <div class="row shadow-lg p-3">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/toyota.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Fortuner</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>1500000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=TOYOTA Fortuner & price=1500000">Add to
                            Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/images4.jfif" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>camry</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>2300000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=camry & price=2300000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/toyota1.jpg" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Corrola</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>1500000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=Corrola & price=2000000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/toyota2.jpg" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>cross</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>1700000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=cross & price=2000000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/images5.jfif" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>altis</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>2200000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=altis & price=2200000">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-sm align-items-center d-flex flex-column mt-5">
        <div class="row shadow-lg p-3">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/tesla1.jpg" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>atto 3</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>1500000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=atto 3 & price=1500000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/BYD1.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>TESLA</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>2000000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=Tesla model X & price=2000000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/BYD2.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>dolphin</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>1300000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=dolphin & price=1300000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/BYD3.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>han</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>3100000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=han & price=3100000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/BYD4.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>seagull</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>900000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=seagull & price=900000">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-sm align-items-center d-flex flex-column mt-5">
        <div class="row shadow-lg p-3">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/BYD5.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>seal</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>2000000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=seal & price=2000000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/mitsu5.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>triton</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>1900000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=Tesla model X & price=2000000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/mitsu1.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>mirage</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>700000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=mirage & price=700000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/mitsu2.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>mirage g4</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>900000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=mirage g4 & price=900000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/mitsu3.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>montero</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>2000000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=montero & price=2000000">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-sm align-items-center d-flex flex-column mt-5">
        <div class="row shadow-lg p-3">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/mitsu4.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>outlander</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>2900000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=outlander & price=2900000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/mazda1.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>mazda 2 hatchback</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>1200000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=mazda 2 hatchback & price=1200000">Add to
                            Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/mazda2.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>mazda 3</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>1700000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=mazda 3 & price=1700000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/mazda3.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>fastback</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>1700000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=fastback & price=1700000">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid object-fit-cover d-flex" src="img/mazda4.webp" style="width: 50vw;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>sports wagon</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>2200000</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="preview.php?car=sports wagon & price=2200000">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row w-100 mb-5"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>