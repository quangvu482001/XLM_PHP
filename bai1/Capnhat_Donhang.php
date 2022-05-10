<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="Capnhat_Donhang.php">
        Ma khach hang: <select name="maKh">
            <?php
                $j = 0;
                $k = 0;
                require 'KH.php';
                require 'DH.php';
                $xml = new SimpleXMLElement("Donhang.xml", null, true);
                $xml1 = new SimpleXMLElement("Khachhang.xml", null, true);
                $Donhang = array();
                $Khachhang = array();
                foreach ($xml as $dh) {
                    $Donhang[$j] = new Donhang($dh->Makh, $dh->Mahang, $dh->Tenhang, $dh->Dongia);
                    $j++;
                }
                foreach ($xml1 as $kh) {
                    $Khachhang[$k] = new Khachhang($kh->Makh, $kh->Hoten, $kh->Diachi);
                    $k++;
                }
                for($i = 0; $i < $k; $i++) {
                    $maKh = $Khachhang[$i]->getMakh();
                    echo "<option value=$maKh>$maKh</option>";
                }
            ?>
        </select>
        <br>

        Ma hang <input type="text" name="Mahang"><br>
        Ten hang <input type="text" name="Tenhang"><br>
        Don gia <input type="text" name="Dongia"><br>
        <input type="submit" name="Add" value="Them">
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa">
        <input type="submit" name="Xem" value="Xem thong tin">
        <li>
            <a href="header.html">Home</a>
        </li>
    </form>

    <?php
        if(isset($_POST['Xem'])) {
            echo "<table border='1' cellspacing='0' cellpadding='10'>";
            echo "<tr>";
            echo "<th>Ma khach</th>";
            echo "<th>Ma hang</th>";
            echo "<th>Ten hang</th>";
            echo "<th>Don gia</th>";
            echo "</tr>";
            foreach($Donhang as $dh) {
                echo "<tr>";
                echo "<td>{$dh->getMakh()}</td>";
                echo "<td>{$dh->getMahang()}</td>";
                echo "<td>{$dh->getTenhang()}</td>";
                echo "<td>{$dh->getDongia()}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        if(isset($_POST['Add'])) {
            $Ma = $_POST['maKh'];
            $Ma1 = $_POST['Mahang'];
            $Ten = $_POST['Tenhang'];
            $DonGia = $_POST['Dongia'];
            $Donhang = new Donhang($Ma, $Ma1, $Ten, $DonGia);
            $Donhang->Add();
        }

        if(isset($_POST['Update'])) {
            $Ma = $_POST['maKh'];
            $Ma1 = $_POST['Mahang'];
            $Ten = $_POST['Tenhang'];
            $DonGia = $_POST['Dongia'];
            $Donhang = new Donhang($Ma, $Ma1, $Ten, $DonGia);
            $Donhang->Update();
        }

        if(isset($_POST['Delete'])) {
            $Ma = $_POST['maKh'];
            $Ma1 = $_POST['Mahang'];
            $Ten = $_POST['Tenhang'];
            $DonGia = $_POST['Dongia'];
            $Donhang = new Donhang($Ma, $Ma1, $Ten, $DonGia);
            $Donhang->Delete();
        }
    ?>
</body>

</html>