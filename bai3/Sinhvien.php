<?php 
    class Sinhvien{
        private $Masv;
        private $Hoten;
        
        private $Gioitinh;

        public function __construct($Ma, $Ten, $Gioitinh){
            $this->Masv = $Ma;
            $this->Hoten = $Ten;
            $this->Gioitinh = $Gioitinh;
        }
        
        public function __destruct()
        {
            $this->Masv = "";
            $this->Hoten = "";
            $this->Gioitinh = "";
        }
        public function getMasv() { return $this->Masv; }
        
        public function getHoten() { return $this->Hoten; }
        
        public function getGioitinh() { return $this->Gioitinh; }
        public function Load()
        {
            $xml = new SimpleXMLElement("SV.xml", null, true);
            echo "<table border='1'> cellpadding='10'> cellspacing='0'>";
            echo "<tr>";
            echo "<th>Mã sinh viên</th>";
            echo "<th>Họ tên</th>";
            echo "<th>Giới tính</th>";
            echo "<td>Select</td>";
            echo "</tr>";
            foreach ($xml as $mh) {
                $Ma = $mh->Masv;
                $Ht = $mh->Hoten;
                $Gt = $mh->Gioitinh;
                echo "<tr>";
                echo "<td>{$mh->Masv}</td>";
                echo "<td>{$mh->Hoten}</td>";
                echo "<td>{$mh->Gioitinh}</td>";
                echo "<td> <a href='Capnhat_sinhvien.php?ma1=$Ma&ht1=$Ht&gt1=$Gt'>Select</a> </td>";
                // echo "<td> <input type='submit' name='Select' value='Select'> </td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        public function Add() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load('SV.xml');
            $rootTag = $root->getElementsByTagName("qlsv")->item(0);
            $infoTag = $root->createElement("Sinhvien");
            $MakhTag = $root->createElement("Masv",$this->Masv);
            $TenkhTag = $root->createElement("Hoten",$this->Hoten);
            $DiachiTag = $root->createElement("Gioitinh",$this->Gioitinh);
            $infoTag->appendChild($MakhTag);
            $infoTag->appendChild($TenkhTag);
            $infoTag->appendChild($DiachiTag);
            $rootTag->appendChild($infoTag);
            $root->formatoutput=true;
            $root->save('SV.xml');
        }

        public function Update() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load('SV.xml');
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("/qlsv/Sinhvien[Masv='$this->Masv']");
            foreach ($kq as $node) {
                # tao node moi
                $infoTag = $root->createElement("Sinhvien");
                $MasvTag = $root->createElement("Masv",$this->Masv);
                $HotenTag = $root->createElement("Hoten",$this->Hoten);
                $GioitinhTag = $root->createElement("Gioitinh",$this->Gioitinh);
                $infoTag->appendChild($MasvTag);
                $infoTag->appendChild($HotenTag);
                $infoTag->appendChild($GioitinhTag);
                // thay the node moi vao node cu
                $node->parentNode->replaceChild($infoTag,$node);
            }
            $root->formatoutput=true;	
            $root->save("SV.xml");
        }

        public function Delete() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load("SV.xml");
            $xpath = new DOMXPath($root);
            foreach($xpath->query("/qlsv/Sinhvien[Masv='$this->Masv']") as $node) {
                $node->parentNode->removeChild($node);
            }
            $root->formatoutput=true;
            $root->save("SV.xml");
        }
    }
?>