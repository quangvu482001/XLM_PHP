<?php 
    class Bangdiem{
        private $Masv;
        private $Mamon;
        
        private $Diem1;

        public function __construct($Masv, $Mamon, $Diem1){
            $this->Masv = $Masv;
            $this->Mamon = $Mamon;
            $this->Diem1 = $Diem1;
        }
        
        public function __destruct()
        {
            $this->Masv = "";
            $this->Mamon = "";
            $this->Diem1 = 0;
        }
        public function getMasv() { return $this->Masv; }
        public function getMamon() { return $this->Mamon; }
        public function getDiem1() { return $this->Diem1; }
        public function Load()
        {
            $xml = new SimpleXMLElement("Diem.xml", null, true);
            echo "<table border='1'> cellpadding='10'> cellspacing='0'>";
            echo "<tr>";
            echo "<th>Ma sv</th>";
            echo "<th>Ma mon</th>";
            echo "<th>Diem</th>";
            echo "<td>Select</td>";
            echo "</tr>";
            foreach ($xml as $mh) {
                $Ma = $mh->Masv;
                $Ma1 = $mh->Mamon;
                $diem = $mh->Diem;
                echo "<tr>";
                echo "<td>{$mh->Masv}</td>";
                echo "<td>{$mh->Mamon}</td>";
                echo "<td>{$mh->Diem}</td>";
                echo "<td> <a href='Capnhat_diem.php?ma1=$Ma&ht1=$Ma1&stc=$diem'>Select</a> </td>";
                // echo "<td> <input type='submit' name='Select' value='Select'> </td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        public function Add() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load('Diem.xml');
            $rootTag = $root->getElementsByTagName("QLD")->item(0);
            $infoTag = $root->createElement("SV");
            $MakhTag = $root->createElement("Masv",$this->Masv);
            $TenkhTag = $root->createElement("Mamon",$this->Mamon);
            $DiachiTag = $root->createElement("Diem",$this->Diem1);
            $infoTag->appendChild($MakhTag);
            $infoTag->appendChild($TenkhTag);
            $infoTag->appendChild($DiachiTag);
            $rootTag->appendChild($infoTag);
            $root->formatoutput=true;
            $root->save('Diem.xml');
        }

        public function Update() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load('Diem.xml');
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("/QLD/SV[Masv='$this->Masv' and Mamon='$this->Mamon']");
            foreach ($kq as $node) {
                # tao node moi
                $infoTag = $root->createElement("SV");
                $MakhTag = $root->createElement("Masv",$this->Masv);
                $TenkhTag = $root->createElement("Mamon",$this->Mamon);
                $DiachiTag = $root->createElement("Diem",$this->Diem1);
                $infoTag->appendChild($MakhTag);
                $infoTag->appendChild($TenkhTag);
                $infoTag->appendChild($DiachiTag);
                // thay the node moi vao node cu
                $node->parentNode->replaceChild($infoTag,$node);
            }
            $root->formatoutput=true;	
            $root->save("Diem.xml");
        }

        public function Delete() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load("Diem.xml");
            $xpath = new DOMXPath($root);
            foreach($xpath->query("/QLD/SV[Masv='$this->Masv' and Mamon = '$this->Mamon']") as $node) {
                $node->parentNode->removeChild($node);
            }
            $root->formatoutput=true;
            $root->save("Diem.xml");
        }
    }
?>