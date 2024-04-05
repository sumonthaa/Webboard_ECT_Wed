<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Webboard Sumontha</title>
</head>
<div class="container-lg">
<h1 style="text-align: center;">Webboard Sumontha</h1>
</div>
<?php include ("nav.php") ?>

<body class="container">


    <?php
    $sql = "SELECT user_id FROM post WHERE post.id=$_GET[id]";
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    foreach ($conn->query($sql) as $row) {
        if (!isset($_SESSION['id']) || $_SESSION['user_id'] != $row['user_id']) {
            header("location:index.php");
            die();
        }
    }
    ?>
    <div class="row mt-4">
        <div class="col-lg-3 col-md-2 col-sm-1"></div>
        <div class="col-lg-6 col-md-8 col-sm-10">
            <?php
            if (isset($_SESSION['add_edit'])) {
                if ($_SESSION['add_edit'] == "success") {
                    echo "<div class="alert alert-success">แก้ไขข้อมูลเรียบร้อย</div>";
                } else {
                    echo "<div class="alert alert-danger">ไม่สามารถแก้ไขข้อมูลได้</div>";
                }
                unset($_SESSION['add_edit']);
            }
            ?>
            <div class="card border-warning">
                <div class="card-header bg-warning text-white">ตั้งกระทู้ใหม่</div>
                <div class="card-body">
                    <form action="editpost_save.php" method="post">
                        <div class="row">
                            <label for="" class="col-lg-3 col-form-label">หมวดหมู่:</label>
                            <div class="col-lg-9">
                                <select name="category" class="form-select" id="">
                                    <?php
                                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                                    $sql = "SELECT post.id , post.cat_id , category.name , category.id FROM post INNER JOIN category ON(post.cat_id=category.id) WHERE post.id=$_GET[id]";

                                    foreach ($conn->query($sql) as $row) {
                                        echo "<option value='$row[3]'>$row[2]</option>";
                                    }
                                    $sql = "SELECT category.id,category.name FROM category INNER JOIN post ON(post.id=$_GET[id]) WHERE NOT category.id=post.cat_id ";
                                    foreach ($conn->query($sql) as $row) {
                                        echo "<option value='$row[0]'>$row[1]</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-lg-3 col-form-label">หัวข้อ:</label>
                            <div class="col-lg-9">
                                <?php
                                $sql = "SELECT * FROM post  WHERE post.id=$_GET[id]";
                                foreach ($conn->query($sql) as $row) {
                                    echo "<input type="text" name="topic" id="" class="form-control" value="$row[title]" required>";

                                    echo "<input type="text" name="id" style="display:none" value=$_GET[id]>";

                                }
                                ?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-lg-3 col-form-label">เนื้อหา:</label>
                            <div class="col-lg-9">
                                <?php
                                foreach ($conn->query($sql) as $row) {
                                    echo "<textarea name="comment" id="" rows="8" class="form-control">$row[content]</textarea>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-warning btn-sm text-white me-2">
                                    <i class="bi bi-caret-right-square"></i> บันทึกข้อความ</button>
                                <button type="reset" class="btn btn-danger btn-sm"><i class="bi bi-x-square"> ยกเลิก</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-2 col-sm-1"></div>
    </div>

</body>

</html>