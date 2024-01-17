<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Newpost</title>
</head>
<body>
    <h1 align="center">Webboad Sumontha</h1>
    <hr>
    ผู้ใช้ : <?php echo $_SESSION['username']; ?>
    <form>
        <table>
            <tr><td>หมวดหมู่:</td>
            <td>
                <select>
                <option value="general">เรื่องทั่วไป</option>
                <option value="study">เรื่องเรียน</option>
            </select>
            </td>
            </tr>
            <tr><td>หัวข้อ:</td><td><input type="text"name="topic"></td></tr>
            <tr><td>เนื้อหา:</td><td><textarea rows="2" cols="30"></textarea></td></tr>
            <tr><td></td><td><input type="submit" value="บันทึกข้อความ"></td></tr>
        </table>
    </form>
</body>
</html>