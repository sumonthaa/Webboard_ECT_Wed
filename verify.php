<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify</title>
</head>
<body>
    <h1 style="text-align: center;">Webboard Sumontha</h1>
    <hr>
    <div style="text-align: center;">
    <?php
        if (($_POST["login"] == "admin") && ($_POST["pwd"] == "ad1234")) {
            $_SESSION["username"]="admin";
            $_SESSION["role"]="a";
            $_SESSION["id"]=session_id();
            echo "ยินดีต้อนรับคุณ ADMIN";
        } else if (($_POST["login"] == "member") && ($_POST["pwd"] == "mem1234")) {
            $_SESSION["username"]="member";
            $_SESSION["role"]="m";
            $_SESSION["id"]=session_id();
            echo "ยินดีต้อนรับคุณ MEMBER";
        } else {echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";}
    ?><br>
      <a href="index.php">กลับไปยังหน้าหลัก</a>
    </div>
</body>
</html>