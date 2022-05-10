<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import "bourbon";

    body {
        background: #eee !important;
        font-size: 25px;
    }

    .wrapper {
        margin-top: 80px;
        margin-bottom: 80px;
    }

    .form-signin {
        max-width: 380px;
        padding: 15px 35px 45px;
        margin: 0 auto;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.1);

        .form-signin-heading,
        .checkbox {
            margin-bottom: 30px;
        }

        .checkbox {
            font-weight: normal;
        }

        .form-control {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            @include box-sizing(border-box);

            &:focus {
                z-index: 2;
            }
        }

        input[type="text"] {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        input[type="password"] {
            margin-bottom: 20px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <form class="form-signin" method="POST" action="NV.php">
            <h2 class="form-signin-heading">Cau 3</h2>
            <input type="text" class="form-control" name="manhanvienn" placeholder="Mã nhân viên" autofocus="" />
            <input type="text" class="form-control" name="hotenn" placeholder="Họ tên" />
            <input type="text" class="form-control" name="gioitinhh" placeholder="Giới tính" />
            <input type="text" class="form-control" name="ngaysinhs" placeholder="Ngày sinh" />
            <input type="text" class="form-control" name="diachii" placeholder="Địa chỉ" />
            <input type="submit" name="Add" value="Them">
            <input type="submit" name="Update" value="Sua">
            <input type="submit" name="Delete" value="Xoa">
            <input type="submit" name="Xem" value="Xem thong tin">
        </form>
    </div>
    <?php 
        require 'Nhanvien.php';
        $xml = new SimpleXMLElement("Nhanvien.xml",null,true);
        if(isset($_POST['Xem'])){
            echo "<table border='1' style='mảgin:0 auto' cellspacing='0' cellpadding='10'>";
                echo "<tr>";
                echo "<td>Ma nhanvien</td>";
                echo "<td>Ho ten</td>";
                echo "<td>Giotinh</td>";
                echo "<td>Ngay sinh</td>";
                echo "<td>Dia chi</td>";
            echo "<tr>";
            foreach($xml as $mh)
            {
                echo "<tr>";
                echo "<td>{$mh->Manv}</td>";
                echo "<td>{$mh->Hoten}</td>";
                echo "<td>{$mh->Gioitinh}</td>";
                echo "<td>{$mh->Ngaysinh}</td>";
                echo "<td>{$mh->Diachi}</td>";
            echo "<tr>";
            }
            echo "</table>";
        }

        if(isset($_POST['Add'])){
            $Ma = $_POST['manhanvienn'];
            $Ten = $_POST['hotenn'];
            $Gioitinh = $_POST['gioitinhh'];
            $Ngaysinh = $_POST['ngaysinhs'];
            $Diachi = $_POST['diachii'];
            $Nhanvien = new nhanvien($Ma,$Ten,$Gioitinh,$Ngaysinh,$Diachi);
            $Nhanvien->Add();
        }

        if(isset($_POST['Update'])){
            $Ma = $_POST['manhanvienn'];
            $Ten = $_POST['hotenn'];
            $Gioitinh = $_POST['gioitinhh'];
            $Ngaysinh = $_POST['ngaysinhs'];
            $Diachi = $_POST['diachii'];
            $Nhanvien = new nhanvien($Ma,$Ten,$Gioitinh,$Ngaysinh,$Diachi);
            $Nhanvien->Update();
        }

        if(isset($_POST['Delete'])){
            $Ma = $_POST['manhanvienn'];
            $Ten = $_POST['hotenn'];
            $Gioitinh = $_POST['gioitinhh'];
            $Ngaysinh = $_POST['ngaysinhs'];
            $Diachi = $_POST['diachii'];
            $Nhanvien = new nhanvien($Ma,$Ten,$Gioitinh,$Ngaysinh,$Diachi);
            $Nhanvien->Delete();
        }
    ?>
</body>

</html>