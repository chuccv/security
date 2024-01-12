<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo SQL Injection đơn giản</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Nhập tên của bạn">
        <input type="submit" value="Gửi">
    </form>

    <?php

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $conn = mysqli_connect("localhost", "root", "vanchuc97", "e246");
        // Lỗ hổng SQL Injection // Enter in Name: ' OR 1 = 1 OR '
        $sql = "SELECT * FROM admin_user WHERE firstname = '$name'";
        echo $sql;
        $result = mysqli_query($conn, $sql);
        $rows = [];
            while($row = $result->fetch_row()) {
                $rows[] = $row;
            }
        echo '<br>';  echo '<br>';  echo '<br>';
        echo count($rows);
        var_dump($rows);
    }
    ?>
</body>
</html>
