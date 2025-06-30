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
$email = $_SESSION['email'];
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

<body>
    <style>
        body * {
            text-align: center;
        }
    </style>
    <div class="row w-100 py-5 bg-dark align-items-center">
        <div class="col">
            <h1 class="text-danger m-0">KEVI MOTORS</h1>
        </div>
        <div class="col-auto  position-absolute">
            <a href="user.php" class="btn btn-warning mx-5">
                Return
            </a>
        </div>
    </div>
    <div class="container-sm my-5">
        <div class="row">
            <div class="col">
                <h4 class="text-center mb-3 text-primary">My Orders</h4>
                <form method="post" class="mb-3 d-flex justify-content-center gap-2 flex-column">
                    <div class="col d-flex">
                        <input class="form-control" type="text" name="search" placeholder="Search Item Name">
                        <button class="btn btn-primary" type="submit" name="submit">Search</button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Order Date</th>
                                    <th>Item</th>
                                    <th>Cost</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Actions</th> <!-- Add column for delete -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('connection.php');
                                if (!$connection) {
                                    echo "<tr><td colspan='6'>Connection Failed</td></tr>";
                                } else {
                                    $query = null;
                                    if (!empty($_POST['search'])) {
                                        $search = mysqli_real_escape_string($connection, $_POST['search']);
                                        $query = mysqli_query(
                                            $connection,
                                            "SELECT * FROM orders 
                             WHERE email = '$email' 
                             AND item LIKE '%$search%' 
                             ORDER BY order_date DESC"
                                        );
                                    } else {
                                        $query = mysqli_query(
                                            $connection,
                                            "SELECT * FROM orders 
                             WHERE email = '$email' 
                             ORDER BY order_date DESC"
                                        );
                                    }

                                    if ($query && mysqli_num_rows($query) > 0) {
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            $item = $row['item'];
                                            $orderID = $row['orderID'];
                                            echo "<tr>
                                <td>{$row['order_date']}</td>
                                <td>{$row['item']}</td>
                                <td>{$row['cost']}</td>
                                <td>{$row['quantity']}</td>
                                <td>{$row['amount']}</td>
                                <td>
                                    <a href='user_delete.php?orderID=$orderID' 
                                       class='btn btn-sm btn-danger' 
                                       onclick=\"return confirm('Are you sure you want to delete this item?');\">
                                       Delete
                                    </a>
                                </td>
                            </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No orders found.</td></tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <button class="btn btn-secondary" type="submit" name="view_all">View All</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>