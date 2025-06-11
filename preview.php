<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body style="display: grid; place-items: center;">
<style>
        body *{
            text-align: center;
        }
        
    </style>
    <div class="row w-100 py-5 bg-dark">
        <h1 class="text-danger">KEVI MOTORS</h1>
    </div>
    <div class="container-sm">
    <form action="checkout.php" method="get">
        <div class="col-12 col-md-8 col-xl-6 offset-md-2 offset-xl-3 shadow-lg p-5 rounded">
            <div class="row">
                <div class="col-3 justify-content-end d-flex">
                    <h5>Item Name:</h5>
                </div>
                <div class="col">
                    <input class="w-100" type="text" name="car" value="
                    <?php
                        $car = $_GET['car'];
                        print "$car";
                    ?>
                    " readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-3 justify-content-end d-flex">
                <h5>Item Price:</h5>
                </div>
                <div class="col w-100">
                <input class="w-100" type="text" name="price" value="
                    <?php
                        $price = $_GET['price'];
                        print "$price";
                    ?>
                    " readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-3 justify-content-end d-flex">
                <h5>Item Quantity:</h5>
                </div>
                <div class="col w-100">
                <input class="w-100" type="number" name="quantity" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary" type="submit">Order Now!</button>
                </div>
            </div>
        </div>
    </div>
    </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>