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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>register</title>
</head>
<body>
    <script>
        function OnblurPwd(){
            let pwd=document.getElementById("pwd");
            let pwd2=document.getElementById("pwd2");
            if(pwd.value!==pwd2.value){
                alert("รหัสผ่านทั้งสองช่องไม่ตรงกัน");
                pwd2.value="";
            }
        }
    </script>
    <div class="container-lg">
      <h1 style="text-align: center;" class="mt-3">Webboard Sumontha</h1>  
      <?php include "nav.php" ?>
    <div class="row mt-4">
        <div class="col-lg-3 col-md-2 col-sm-1"></div>
        <div class="col-lg-6 col-md-8 col-sm-10">
        <?php
                if(isset($_SESSION['add_login'])){
                    if($_SESSION['add_login']=="error"){
                        echo "<div class='alert alert-danger'>
                        ชื่อบัญชีซ้ำหรือตัวฐานข้อมูลมีปัญหา</div>";
                        }else{
                            echo "<div class='alert alert-success'>
                            เพิ่มบัญชีเรียบร้อยแล้ว</div>";
                        }
                        unset($_SESSION['add_login']);
                    }
            ?>
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">เข้าสู่ระบบ</div>
                <div class="card-body">
                    <form action="register_save.php" method="post">
                        <div class="row">
                            <label for="user" class="col-lg-3 col-form-label">ชื่อบัญชี:</label>
                            <div class="col-lg-9">
                                <input id="user" type="text" name="login" class="form-control" required>
                            </div>
                        </div>
                        <div class=" row mt-3">
                            <label class="col-lg-3 col-form-label">รหัสผ่าน:</label>
                            <div class="col-lg-9">
                                <input type="password" name="pwd" id="pwd" class="form-control" required>
                            </div>
                        </div>

                        <div class=" row mt-3">
                            <label class="col-lg-3 col-form-label">ใส่รหัสผ่านซ้ำ:</label>
                            <div class="col-lg-9">
                                <input type="password" name="pwd2" id="pwd2" onblur="OnblurPwd()" class="form-control" required>
                            </div>
                        </div>

    <div class="row mt-3">
        <label class="col-lg-3 col-form-label">ชื่อ-นามสกุล:</label>
        <div class="col-lg-9">
            <input type="text" name="name" class="form-control" required>
        </div>
    </div>
    <div class="row mt-3">
        <label class="col-lg-3 form-label">เพศ:</label>
        <div class="col-lg-9">
            <div class="form-check">
                <input type="radio" name="gender" value="m" class="form-check-input" required>
                <label class="form-check-label">ชาย</label>
            </div>
            <div class="form-check">
                <input type="radio" name="gender" value="f" class="form-check-input" required>
                <label class="form-check-label">หญิง</label>
            </div>
            <div class="form-check">
                <input type="radio" name="gender" value="o" class="form-check-input" required>
                <label class="form-check-label">อื่นๆ</label>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <label class="col-lg-3 col-form-label">อีเมล:</label>
        <div class="col-lg-9">
            <input type="email" name="email" class="form-control" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-sm me-2">
            <i class="bi bi-save"></i>สมัครสมาชิก</button>
            <button type="reset" class="btn btn-danger btn-sm">
            <i class="bi bi-x-square"></i>ยกเลิก</button>
        </div>
    </div>
</form>

</div>

    </div>
    </div>
    <div class="col-lg-3 col-md-2 col-sm-1"></div>
    </div>
    </div>
    <br>
</body>
</html>