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
</head>
<body>
<div class="container-lg">
    <h1 style="text-align: center;">Webboard Sumontha</h1>
    <hr>
    <?php include "nav.php"?>

<div class="mt-3 d-flex justify-content-between">
    <div>
    <label>หมวดหมู่</label>
    <span class="dropdown">
    <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    --ทั้งหมด--</button>
    <ul class="dropdown-menu" aria-labelledby="button2">
     <li><a href="#" class="dropdown-item">ทั้งหมด</a></li>
     <?php
     $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
     $sql="SELECT * FROM category";
     foreach($conn->query($sql) as $row){
        echo "<li><a class=dropdow-item href=#>$row[name]</a></li>";
     }
     $conn=null;
     ?>
  </ul>
    </span>
</div>
<br>
<table class="table table-striped">
                <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT t3.name,t1.id,t1.title,t2.login,t1.post_date FROM post as t1
                INNER JOIN user as t2 ON (t1.user_id=t2.id) 
                INNER JOIN category as t3 ON (t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
                $result = $conn->query($sql);
                while ($row = $result->fetch()) {
                    echo "<tr><td>[$row[0] ] <a style=text-decoration:none
                    href=post.php?id=$row[1]>$row[2]</a><br>
                    $row[3] - $row[4]</td></tr>";
                }
                $conn = null;
                ?>
            </table>


<?php if(isset($_SESSION['id'])){ ?>
<div><a href="newpost.php" class="btn btn-success btn-sm">
    <i class="bi bi-plus"></i> สร้างกระทู้ใหม่</a>
    </div>
    <?php } ?>
    </div>

    <table class="table table-striped mt-4 ">
        <?php
            for($i=1;$i<=10;$i++){       
                echo "<tr><td class='d-flex justify-content-between'><a href=post.php?id=$i sytle=text-decoration:none>กระทู้ที่ $i</a>";
                if(isset($_SESSION['id']) && $_SESSION['role']=='a'){
                    echo "&nbsp;&nbsp;&nbsp;<a href=delete.php?id=$i class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></a>";
                }
                echo "</td></tr>";
            }
        ?>
    </table>
    </div>
</body>
</html>