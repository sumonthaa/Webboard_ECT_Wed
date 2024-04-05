<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Webboard Sumontha</title>
    <script>
        function myFunction() {
            let r = confirm("ต้องการจะลบจริงหรือไม่?");
            return r;
        }
        </script>
</head>

<body>
    <div class="container-lg">
    <h1 style="text-align: center;">Webboard Sumontha</h1>

        <?php include "nav.php" ?>

        <?php
        if (!isset($_SESSION['id']) || $_SESSION['role'] != "a") {
            header("location:index.php");
            die();
        }
        ?>
        <div class="container text-center mt-4">
            <div class="row mt-4">
                <?php
                if (isset($_SESSION['add_cat'])) {
                    if ($_SESSION['add_cat'] == "success") {
                        echo "<div class="alert alert-success">เพิ่มหมวดหมู่เรียบร้อย</div>";
                    } else {
                        echo "<div class="alert alert-danger">ไม่สามารถเพิ่มหมวดหมู่ได้</div>";
                    }
                    unset($_SESSION['add_cat']);
                }

                if (isset($_SESSION['cat_delete'])) {
                    if ($_SESSION['cat_delete'] == "success") {
                        echo "<div class="alert alert-success">ลบหมวดหมู่เรียบร้อย</div>";
                    } else {
                        echo "<div class="alert alert-danger">ไม่สามารถลบหมวดหมู่ได้</div>";
                    }
                    unset($_SESSION['cat_delete']);
                }
                ?>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-2">

                </div>
                <div class="col-lg-6 col-sm-8 align-self-center ">
                    <table class="table table-striped mt-4 ms-5">
                        <tr>
                            <th>ลำดับ</th>
                            <th>หมวดหมู่</th>
                            <th>จัดการ</th>
                        </tr>

                        <?php
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                        $sql = "SELECT * FROM category";
                        $i = 0;

                        foreach ($conn->query($sql) as $row) {
                            $i++;
                            echo "<tr class=''> <td><div>$i</div></td> <td><div>$row[name]</div></td> 
                            
                            <td class=''><div class='me-2 align-self-center d-inline' data-bs-toggle='modal' data-bs-target='#exampleModal1'><a
                            class='btn btn-warning btn-sm' onclick='' id='name' value='$row[name]'><i class='bi bi-pencil-fill'></i></a></div>
                             <div class='me-2 align-self-center d-inline'> <a href='category_delete.php?id=$row[id]'
                            class='btn btn-danger btn-sm' onclick='return myFunction()'> <i class='bi bi-trash'></i> </a> </div> </td></tr>";

                        }
                        ?>

                    </table>
                </div>
                <div class="col-lg-3 col-sm-2">

                </div>
            </div>

            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                data-bs-target="#exampleModal"><i class="bi bi-file-plus"></i> เพิ่มหมวดหมู่ </button>
        </div>

        <form action="category_save.php" method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มหมวดหมู่</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="add_category">ชื่อหมวดหมู่:</label>
                            <input type="text" class="form-control mt-2" id="add_category" name="add_category">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>  
</body>
</html>