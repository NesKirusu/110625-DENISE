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
    <title>ADMIN</title>
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
        <div class="col">
            <form action="user.php" method="post">
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
    <div class="container-sm my-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center mb-3 text-dark">Orders</h1>
                <form method="post" class="mb-3 d-flex justify-content-center gap-2 flex-column">
                    <div class="col d-flex gap-2">
                        <input class="form-control" type="text" name="search" placeholder="Search Item Name">
                        <input class="form-control" type="text" name="search_email" placeholder="Search Email">
                        <button class="btn btn-primary" type="submit" name="submit">Search</button>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-hover text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Select</th>
                                    <th>Order Date</th>
                                    <th>Email</th>
                                    <th>Item</th>
                                    <th>Cost</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('connection.php');

                                if (!$connection) {
                                    print "<tr><td colspan='7'>Connection Failed</td></tr>";
                                } else {
                                    if (!empty($_POST['search'])) {
                                        $search = $_POST['search'];
                                        $query = mysqli_query($connection, "SELECT * FROM orders WHERE item LIKE '%$search%' ORDER BY order_date DESC");
                                    } else if (!empty($_POST['search_email'])) {
                                        $search_email = $_POST['search_email'];
                                        $query = mysqli_query($connection, "SELECT * FROM orders WHERE email LIKE '%$search_email%' ORDER BY order_date DESC");
                                    } else {
                                        $query = mysqli_query($connection, "SELECT * FROM orders ORDER BY order_date DESC");
                                    }

                                    if ($query && mysqli_num_rows($query) > 0) {
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            print "<tr>";

                                            if (!empty($_GET['checked']) == 'yes') {
                                                print "<td><input type='checkbox' name='selected[]' value='{$row['orderID']}' checked></td>";
                                            } else {
                                                print "<td><input type='checkbox' name='selected[]' value='{$row['orderID']}'></td>";
                                            }
                                            print "<td>{$row['order_date']}</td>";
                                            print "<td>{$row['email']}</td>";
                                            print "<td>{$row['item']}</td>";
                                            print "<td>{$row['cost']}</td>";
                                            print "<td>{$row['quantity']}</td>";
                                            print "<td>{$row['amount']}</td>";
                                            print "
                                                <td>
                                                    <a href='edit.php?id={$row['orderID']}' class='btn btn-sm btn-warning'>Edit</a>
                                                    <a href='delete.php?id={$row['orderID']}' class='btn btn-sm btn-danger'>Delete</a>
                                                </td>";
                                            print "</tr>";
                                        }
                                    } else {
                                        print "<tr><td colspan='7'>No orders found.</td></tr>";
                                    }
                                }
                                if (!empty($_POST['selected'])) {
                                    foreach ($_POST['selected'] as $value) {
                                        $orderID = $value;
                                        mysqli_query($connection, "DELETE FROM orders WHERE orderID = $orderID");
                                    }
                                    header("Location: admin.php");
                                    exit();
                                }
                                if (!empty($_POST['delete_all'])) {
                                    mysqli_query($connection, "DELETE FROM orders");
                                    header("Location: admin.php");
                                    exit();
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col d-flex justify-content-between gap-2">
                        <div class="d-flex gap-2">
                            <a href="?checked=yes" class="btn btn-success">Check All</a>
                            <a href="admin.php" class="btn btn-success">Clear Check</a>
                            <button class="btn btn-secondary" type="submit" name="view_all">View All</button>
                        </div>
                        <div>
                            <button class="btn btn-danger" type="submit" name="delete_selected"
                                onclick="return confirm('Delete selected orders?');">Delete Selected</button>
                            <button class="btn btn-danger" type="submit" name="delete_all"
                                onclick="return confirm('Are you sure you want to delete all orders?');">Delete
                                All</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-sm">
        <div class="row">
            <div class="col">
                <h1 class="text-center mb-3 text-dark">Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="ordersPerDayChart" style="height: 300px; width: 100%;"></div>
                <script>
                    var ordersPerDayChart = new CanvasJS.Chart("ordersPerDayChart", {
                        animationEnabled: true,
                        theme: "light2",
                        title: { text: "Total Orders Per Day" },
                        axisX: { title: "Date" },
                        axisY: { title: "Number of Orders" },
                        data: [{
                            type: "line",
                            dataPoints:
                        }]
                    });
                    ordersPerDayChart.render();
                </script>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>