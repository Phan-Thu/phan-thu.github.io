<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ccode = $_POST['ccode'];
    $cname = $_POST['cname'];
    $ccredit = $_POST['ccredit'];
    $cduration = $_POST['cduration'];
    $cinstructor = isset($_POST['cinstructor']) ? implode(", ", $_POST['cinstructor']) : "";
    $coutline = $_POST['coutline'];

    $sql = "INSERT INTO list (ccode, cname, cduration, ccredit, cinstructor, coutline)
            VALUES ('$ccode', '$cname', '$cduration', '$ccredit', '$cinstructor', '$coutline')";
    if ($conn->query($sql) === TRUE) {
        header("Location: list.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Môn Học Mới</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        .container {
            background: #fff;
            margin-top: 40px;
            padding: 30px 40px;
            border-radius: 10px;
            width: 600px;
            box-shadow: 0px 6px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2d3e50;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 15px;
        }
        textarea {
            height: 120px;
            resize: vertical;
        }
        .checkbox-group {
            margin-top: 10px;
        }
        .checkbox-group label {
            font-weight: normal;
            display: block;
            margin-top: 5px;
        }
        button {
            margin-top: 20px;
            padding: 12px 20px;
            width: 100%;
            border: none;
            background-color: #27ae60;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1e8449;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>➕ Thêm Môn Học Mới</h2>
    <form action="addcourse_action.php" method="POST">
        <label for="ccode">Mã môn học:</label>
        <input type="text" id="ccode" name="ccode" required>

        <label for="cname">Tên môn học:</label>
        <input type="text" id="cname" name="cname" required>

        <label for="ccredit">Số tín chỉ:</label>
        <input type="number" id="ccredit" name="ccredit" min="1" max="10" value="1" required>

        <label for="cduration">Thời lượng (giờ):</label>
        <select id="cduration" name="cduration">
            <option value="15">15</option>
            <option value="30" selected>30</option>
            <option value="45">45</option>
        </select>

        <label>Chọn giảng viên phụ trách:</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="instructor[]" value="Aliba HJ"> Aliba HJ</label>
            <label><input type="checkbox" name="instructor[]" value="Jame Hot"> Jame Hot</label>
            <label><input type="checkbox" name="instructor[]" value="Taliba Adam"> Taliba Adam</label>
            <label><input type="checkbox" name="instructor[]" value="John Ken"> John Ken</label>
        </div>

        <label for="coutline">Đề cương chi tiết:</label>
        <textarea id="coutline" name="coutline" placeholder="Ví dụ:
            Chương 1: Giới thiệu lịch sử phát triển website
            Chương 2: Ngôn ngữ HTML
            Chương 3: Ngôn ngữ CSS"></textarea>

        <button type="submit">💾 Lưu môn học</button>
    </form>
</div>

</body>
</html>
