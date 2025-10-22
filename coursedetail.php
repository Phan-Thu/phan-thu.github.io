<?php
include 'config.php';

$ccode = $_GET['ccode'];
$sql = "SELECT * FROM list WHERE ccode = '$ccode'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết môn học</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: #fff;
            width: 60%;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            animation: fadeIn 0.5s ease-in-out;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .detail-item {
            margin: 12px 0;
            font-size: 18px;
        }
        .detail-item strong {
            color: #34495e;
        }
        a.back-btn {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }
        a.back-btn:hover {
            background: #217dbb;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📘 Chi tiết môn học: <?php echo $row['cname']; ?></h2>
        <div class="detail-item"><strong>Mã môn:</strong> <?php echo $row['ccode']; ?></div>
        <div class="detail-item"><strong>Thời lượng:</strong> <?php echo $row['cduration']; ?> giờ</div>
        <div class="detail-item"><strong>Tín chỉ:</strong> <?php echo $row['ccredit']; ?></div>
        <div class="detail-item"><strong>Giảng viên:</strong> <?php echo $row['cinstructor']; ?></div>
        <div class="detail-item"><strong>Đề cương:</strong> <?php echo nl2br($row['coutline']); ?></div>

        <a href="list.php" class="back-btn">← Quay lại danh sách môn học</a>
    </div>
</body>
</html>
