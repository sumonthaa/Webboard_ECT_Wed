<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body align="center">
    <h1 style="text-align: center;">Webboard Sumontha</h1>
    <hr>
    <div align="center">
        ต้องการดูกระทู้หมายเลข <?php echo $_GET["id"]; ?><br>
        <br>
        <?php
            if($_GET["id"]%2==0){
                echo "เป็นกระทู้หมายเลขคู่";
            }else{
                echo "เป็นกระทู้หมายเลขคี่";
            }
        ?>
    </div>
    <br>
    <table style="border: 2px solid black; width:40%" align="center">
        <tr style="background-color: #6cd2fe ;"><td>แสดงความคิดเห็น</td></tr>
        <tr><td>
            <textarea cols="50" rows="10"></textarea>
            <tr><td colspan="2"align="center"><input type="submit"value="ส่งข้อความ"></td></tr>
        </td></tr>
    </table>
    <div style="text-align: center;">
        <a href="index.php">กลับไปหน้าหลัก</a>
    </div>
</body>
</html>