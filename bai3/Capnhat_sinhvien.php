<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
        $Ma = $_GET["ma1"];
        $Hoten = $_GET["ht1"];
        $Gioitinh = $_GET["gt1"];
        require 'Sinhvien.php';
        
        if (isset($_POST["Xem"])) {
            $ob = new Sinhvien(0,0,0);
            $ob->Load();
        }
        if (isset($_POST["Add"])) {
            $Ma = $_POST["Masv"];
            $Ten = $_POST["Hoten"];
            $Gioitinh = $_POST["Gioitinh"];
            $ob = new Sinhvien($Ma,$Ten,$Gioitinh);
            $ob->Add();
        }
        if (isset($_POST["Update"])) {
            $Ma = $_POST["Masv"];
            $Ten = $_POST["Hoten"];
            $Gioitinh = $_POST["Gioitinh"];
            $ob = new Sinhvien($Ma,$Ten,$Gioitinh);
            $ob->Update();
        }
        if (isset($_POST["Delete"])) {
            $Ma = $_POST["Masv"];
            $Ten = $_POST["Hoten"];
            $Gioitinh = $_POST["Gioitinh"];
            $ob = new Sinhvien($Ma,$Ten,$Gioitinh);
            $ob->Delete();
        }
    ?>
    <form method="POST" action="Capnhat_sinhvien.php">
        Ma sv <input type="text" name="Masv" value="<?php echo $Ma;?>"><br>
        Hoten <input type="text" name="Hoten" value="<?php echo $Hoten;?>"><br>
        Gioitinh <input type="text" name="Gioitinh" value="<?php echo $Gioitinh;?>"><br>
        <input type="submit" name="Add" value="Insert">
        <input type="submit" name="Update" value="Update">
        <input type="submit" name="Delete" value="Delete">
        <input type="submit" name="Xem" value="View">
    </form>
</body>

</html>