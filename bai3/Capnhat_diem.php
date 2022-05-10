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
        $Ma1 = $_GET["ma1"];
        $Ma2 = $_GET["ht1"];
        $Diem = $_GET["stc"];
        require 'Bangdiem.php';
        
        if (isset($_POST["Xem"])) {
            $ob = new Bangdiem(0,0,0);
            $ob->Load();
        }
        if (isset($_POST["Add"])) {
            $Ma = $_POST["Masv"];
            $Ma1 = $_POST["Mamon"];
            $diem = $_POST["Diem1"];
            $ob = new Bangdiem($Ma,$Ma1,$diem);
            $ob->Add();
        }
        if (isset($_POST["Update"])) {
            $Ma = $_POST["Masv"];
            $Ma1 = $_POST["Mamon"];
            $diem = $_POST["Diem1"];
            $ob = new Bangdiem($Ma,$Ma1,$diem);
            $ob->Update();
        }
        if (isset($_POST["Delete"])) {
            $Ma = $_POST["Masv"];
            $Ma1 = $_POST["Mamon"];
            $diem = $_POST["Diem1"];
            $ob = new Bangdiem($Ma,$Ma1,$diem);
            $ob->Delete();
        }
    ?>
    <form method="POST" action="Capnhat_diem.php">
        Ma sv <select name="masv">
            <?php 
    $k=0;
    require 'Sinhvien.php';
    $xml = new SimpleXMLElement("SV.xml", null, true);
    $SV = array();
    foreach ($xml as $dh) {
        $SV[$k] = new Sinhvien($dh->Masv,$dh->Hoten,$dh->Gioitinh);
        $k++;
    }
    for($i=0;$i<$k;$i++){
        $masv = $SV[$i]->getMasv();
        echo "<option value='$masv'>$masv</option>";
    }
?>
        </select> <br>
        Ma mon <select name="mamon">
            <?php
    $k1=0;
    require 'Mon.php';
    $xml = new SimpleXMLElement("Mon.xml", null, true);
    $mon = array();
    foreach ($xml as $dh) {
        $mon[$k1] = new Monhoc($dh->Mamon,$dh->Tenmon,$dh->SoTC);
        $k1++;
    }
    for($i=0;$i<$k1;$i++){
        $mamon = $mon[$i]->getMamon();
        echo "<option value='$mamon'>$mamon</option>";
    }
?>
        </select> <br>
        Diem <input type="text" name="Diem1" value="<?php echo $Diem;?>"><br>
        <input type="submit" name="Add" value="Insert">
        <input type="submit" name="Update" value="Update">
        <input type="submit" name="Delete" value="Delete">
        <input type="submit" name="Xem" value="View">
    </form>
</body>

</html>