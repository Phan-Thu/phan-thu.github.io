<?php
include 'config.php';

$sql = "SELECT * FROM list";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Môn học</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 40px auto;
            background: #fff;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 20px 30px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            overflow: hidden;
            border-radius: 8px;
        }
        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }
        td {
            padding: 10px;
            text-align: center;
            font-size: 15px;
            color: #333;
            border-bottom: 1px solid #e0e0e0;
        }
        tr:hover {
            background-color: #f1f9f1;
            transition: 0.3s;
        }
        .no-data {
            text-align: center;
            font-style: italic;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📚 Danh sách Môn học</h2>
        <table>
            <tr>
                <th>Mã môn</th>
                <th>Tên môn</th>
                <th>Thời lượng</th>
                <th>Tín chỉ</th>
                <th>Giảng viên</th>
                <th>Đề cương</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td><a class='link-detail' href='coursedetail.php?ccode=".$row['ccode']."'>".$row['ccode']."</a></td>
                            <td>".$row['cname']."</td>
                            <td>".$row['cduration']."</td>
                            <td>".$row['ccredit']."</td>
                            <td>".$row['cinstructor']."</td>
                            <td>".$row['coutline']."</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='no-data'>Không có dữ liệu</td></tr>";
            }
            ?>
        </table>
        <div style="text-align:center;">
            <a href="addcourse.php" class="btn-add">➕ Thêm môn học mới</a>
        </div>
    </div>
</body>
</html>
