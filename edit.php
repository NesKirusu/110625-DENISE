<?php
include('connection.php');
$item = $_GET['item'];
$email = $_GET['email'];
if (!empty($_POST['edit'])) {
    $item = $_POST['car'];
    $quantity = $_POST['quantity'];
    $cost = $_POST['price'];
    $amount = $cost * $quantity;

    mysqli_query($connection, "UPDATE orders SET quantity = $quantity, amount = $amount WHERE item = '$item'");
    header("Location: admin.php");
    exit();
}
$query = mysqli_query($connection, "SELECT * FROM orders WHERE item = '$item' AND email = '$email' LIMIT 1");
if ($query && mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Edit - ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="animations.css">
</head>

<body style="display: grid; place-items: center;">
    <style>
        body * {
            text-align: center;
        }
    </style>
    <div class="row w-100 p-5 bg-dark">
        <h1 class="text-danger">KEVI MOTORS - ADMIN</h1>
    </div>
    <div class="container-sm">
        <form method="post" action="edit.php">
            <div class="col-12 col-md-8 col-xl-6 offset-md-2 offset-xl-3 shadow-lg p-5 rounded">
                <div class="row">
                    <h1 class="text-danger">EDIT ITEM</h1>
                </div>

                <div class="row my-3">
                    <div class="col-4 text-end">
                        <h5>Item Name:</h5>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="car" value="<?php print trim($data['item']); ?>">
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-4 text-end">
                        <h5>Item Price:</h5>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="price" value="<?php print $data['cost']; ?>"
                            readonly>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-4 text-end">
                        <h5>Quantity:</h5>
                    </div>
                    <div class="col">
                        <input class="form-control" type="number" name="quantity"
                            value="<?php print $data['quantity']; ?>" required>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-4 text-end">
                        <h5>Total Price:</h5>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="total"
                            value="<?php print $data['cost'] * $data['quantity']; ?>" readonly>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col d-flex gap-2">
                        <a href="admin.php" name="return" value="return" class="btn btn-primary">Return</a>
                        <button type="submit" name="edit" value="edit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>