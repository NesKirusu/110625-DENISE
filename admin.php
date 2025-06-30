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
    //MORE DESIGN NEEEDED FOR REDIRECTION
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
    <?php
    $images = glob("img/*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
    shuffle($images);
    ?>
    <div class="bgbg" id="randomImages"></div>
    <style>
        .bgbg img {
            position: fixed;
            object-fit: cover;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            opacity: 0;
            filter: brightness(50%);
            transition: opacity 1s ease-in-out;
        }

        .bgbg img.active {
            opacity: 1;
        }
    </style>

    <script>
        const images = <?php echo json_encode($images); ?>;
        const container = document.getElementById('randomImages');

        images.forEach((src, i) => {
            const img = document.createElement('img');
            img.src = src;
            if (i == 0) img.classList.add('active');
            container.appendChild(img);
        });

        const slides = container.querySelectorAll('img');
        let current = 0;

        setInterval(() => {
            slides[current].classList.remove('active');
            current = (current + 1) % slides.length;
            slides[current].classList.add('active');
        }, 5000);
    </script>

    <style>
        body * {
            text-align: center;
        }
    </style>
    <div class="row w-100 py-5 bg-dark align-items-center">
        <div class="col">
            <h1 class="text-danger">KEVI MOTORS - ADMIN</h1>
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
                <h1 class="text-center mb-3 text-white">Orders</h1>
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
    <div class="container-sm border rounded border-white p-2 mb-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center mb-3 text-white">Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                $dataPoints1 = [];
                $result1 = mysqli_query($connection, "SELECT order_date AS date, COUNT(*) AS total_orders FROM orders GROUP BY order_date ORDER BY order_date ASC");
                while ($row = mysqli_fetch_assoc($result1)) {
                    $dataPoints1[] = ["x" => strtotime($row['date']) * 1000, "y" => $row['total_orders']];
                }
                $dataPoints2 = [];
                $result2 = mysqli_query($connection, "SELECT order_date AS date, SUM(amount) AS total_revenue FROM orders GROUP BY order_date ORDER BY order_date ASC");
                while ($row = mysqli_fetch_assoc($result2)) {
                    $dataPoints2[] = ["x" => strtotime($row['date']) * 1000, "y" => $row['total_revenue']];
                }
                $dataPoints3 = [];
                $result3 = mysqli_query($connection, "SELECT item, COUNT(*) AS total FROM orders GROUP BY item ORDER BY total DESC");
                while ($row = mysqli_fetch_assoc($result3)) {
                    $dataPoints3[] = ["label" => $row['item'], "y" => $row['total']];
                }
                $dataPoints4 = [];
                $result4 = mysqli_query($connection, "SELECT email, SUM(amount) AS revenue FROM orders GROUP BY email ORDER BY revenue DESC LIMIT 5");
                while ($row = mysqli_fetch_assoc($result4)) {
                    $dataPoints4[] = ["label" => $row['email'], "y" => $row['revenue']];
                }
                $dataPoints5 = [];
                $result5 = mysqli_query($connection, "SELECT LEFT(order_date, 7) AS month, SUM(amount) AS sales FROM orders GROUP BY month ORDER BY month ASC");
                while ($row = mysqli_fetch_assoc($result5)) {
                    $dataPoints5[] = ["label" => $row['month'], "y" => $row['sales']];
                }
                ?>
                <script>
                    window.onload = function () {
                        var chart1 = new CanvasJS.Chart("chartContainer1", {
                            animationEnabled: true,
                            theme: "light2",
                            title: { text: "Total Orders Per Day" },
                            axisX: { title: "Date", valueFormatString: "YYYY-MM-DD" },
                            axisY: { title: "Number of Orders" },
                            data: [{
                                type: "line",
                                xValueType: "dateTime",
                                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart1.render();

                        var chart2 = new CanvasJS.Chart("chartContainer2", {
                            animationEnabled: true,
                            theme: "light2",
                            title: { text: "Revenue Per Day" },
                            axisX: { title: "Date", valueFormatString: "YYYY-MM-DD" },
                            axisY: { title: "Revenue (PHP)" },
                            data: [{
                                type: "column",
                                xValueType: "dateTime",
                                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart2.render();

                        var chart3 = new CanvasJS.Chart("chartContainer3", {
                            animationEnabled: true,
                            theme: "light2",
                            title: { text: "Orders by Item" },
                            data: [{
                                type: "pie",
                                startAngle: 240,
                                yValueFormatString: "#,##0\" orders\"",
                                indexLabel: "{label} {y}",
                                dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart3.render();

                        var chart4 = new CanvasJS.Chart("chartContainer4", {
                            animationEnabled: true,
                            theme: "light2",
                            title: { text: "Top 5 Customers by Revenue" },
                            axisX: { title: "Revenue (PHP)" },
                            axisY: { title: "Customer", reversed: true },
                            data: [{
                                type: "bar",
                                dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart4.render();

                        var chart5 = new CanvasJS.Chart("chartContainer5", {
                            animationEnabled: true,
                            theme: "light2",
                            title: { text: "Monthly Sales Trend" },
                            axisX: { title: "Month" },
                            axisY: { title: "Sales (PHP)" },
                            data: [{
                                type: "area",
                                dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart5.render();
                    };
                </script>
                <div id="chartContainer1" style="height: 300px; width: 100%; margin-bottom: 30px;"></div>
                <div id="chartContainer2" style="height: 300px; width: 100%; margin-bottom: 30px;"></div>
                <div id="chartContainer3" style="height: 300px; width: 100%; margin-bottom: 30px;"></div>
                <div id="chartContainer4" style="height: 300px; width: 100%; margin-bottom: 30px;"></div>
                <div id="chartContainer5" style="height: 300px; width: 100%; margin-bottom: 30px;"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>