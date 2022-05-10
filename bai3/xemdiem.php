<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="xemdiem.php">
        Nhap masv <input type="text" name="Masv"><br>
        <input type="submit" name="Xem" value="xem diem">
    </form>

    <?php 
        require 'Bangdiem.php';
        require 'Sinhvien.php';
        require 'Mon.php';
        $xml_SV = new SimpleXMLElement("SV.xml", null, true);
        $xml_mon = new SimpleXMLElement("Mon.xml", null, true); 
        $xml_diem = new SimpleXMLElement("Diem.xml", null, true);
        $SV = array();
        $mon = array();
        $diem = array();
        $i=0;
        $j=0;
        $k=0;
        $Masv = "";
        $Hoten = "";
        $Gioitinh = "";
        $mamon= "";
        $tenmon= "";
        $diemsv= 0;
        $sotc=0;
        
        if (isset($_POST["Xem"])) {
            echo "<table border='1' cellspacing='0' cellpadding='10'>";
            echo "<tr>";
            echo "<td>Ten mon</td>";
            echo "<td>So TC</td>";
            echo "<td>Diem</td>";
            echo "</tr>";
            foreach ($xml_sv as $sv1) {
                $sv[$i] = new Sinhvien($sv1->Masv,$sv1->Hoten,$sv1->Gioitinh);
                $i = $i + 1;
            }
            foreach ($xml_mon as $mon1) {
                $mon[$j] = new Monhoc($mon1->Mamon,$mon1->Tenmon,$mon1->SoTC);
                $j = $j + 1;
            }
            foreach ($xml_diem as $diem1) {
                $diem[$k] = new Bangdiem($diem1->Masv,$diem1->Mamon,$diem1->Diem);
                $k = $k + 1;
            }
            foreach ($sv as $sv1) {
                if ($sv1->getMasv() == $_POST["Masv"]) {
                    $Masv = $sv1->getMasv();
                    $Hoten = $sv1->getHoten();
                    $Gioitinh = $sv1->getGioitinh();
                }
            }
            for($i1=0;$i1<count($diem);$i1++){
                $mamon = $diem[$i1]->getMamon();
                $diemsv = $diem[$i1]->getDiem1();
            }
            foreach ($mon as $mon1) {
            $mamon1 = $mon1->getMamon();
            if (strcasecmp($mamon,$mamon1) == 0) {
                $tenmon = $mon1->getTenmon();
                $sotc = $mon1->getSoTC();
            }
            }
            echo "<tr>";
            echo "<td>$tenmon</td>";
            echo "<td>$sotc</td>";
            echo "<td>$diemsv</td>";
            echo "</tr>";
            print("Ma sv: $Masv<br>");
            print("Ho ten: $Hoten<br>");
            print("Gioi tinh: $Gioitinh<br>");
            echo "</table>";
        }
    ?>
</body>

</html>