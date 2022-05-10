<?php 
    class Monhoc{
        private $Mamon;
        private $Tenmon;
        
        private $SoTC;

        public function __construct($Mamon, $Tenmon, $SoTC){
            $this->Mamon = $Mamon;
            $this->Tenmon = $Tenmon;
            $this->SoTC = $SoTC;
        }
        
        public function __destruct()
        {
            $this->Mamon = "";
            $this->Tenmon = "";
            $this->SoTC = "";
        }
        public function getMamon() { return $this->Mamon; }
        public function getTenmon() { return $this->Tenmon; }
        public function getSoTC() { return $this->SoTC; }
        public function Load()
        {
            $xml = new SimpleXMLElement("Mon.xml", null, true);
            echo "<table border='1'> cellpadding='10'> cellspacing='0'>";
            echo "<tr>";
            echo "<th>Ma mon</th>";
            echo "<th>Ten mon</th>";
            echo "<th>So tin chi</th>";
            echo "<td>Select</td>";
            echo "</tr>";
            foreach ($xml as $mh) {
                $Ma = $mh->Mamon;
                $Ht = $mh->Tenmon;
                $SoTC = $mh->SoTC;
                echo "<tr>";
                echo "<td>{$mh->Mamon}</td>";
                echo "<td>{$mh->Tenmon}</td>";
                echo "<td>{$mh->SoTC}</td>";
                echo "<td> <a href='Capnhat_monhoc.php?ma1=$Ma&ht1=$Ht&stc=$SoTC'>Select</a> </td>";
                // echo "<td> <input type='submit' name='Select' value='Select'> </td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        public function Add() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load('Mon.xml');
            $rootTag = $root->getElementsByTagName("qlmh")->item(0);
            $infoTag = $root->createElement("Monhoc");
            $MakhTag = $root->createElement("Mamon",$this->Mamon);
            $TenkhTag = $root->createElement("Tenmon",$this->Tenmon);
            $DiachiTag = $root->createElement("SoTC",$this->SoTC);
            $infoTag->appendChild($MakhTag);
            $infoTag->appendChild($TenkhTag);
            $infoTag->appendChild($DiachiTag);
            $rootTag->appendChild($infoTag);
            $root->formatoutput=true;
            $root->save('Mon.xml');
        }

        public function Update() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load('Mon.xml');
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("/qlmh/Monhoc[Mamon='$this->Mamon']");
            foreach ($kq as $node) {
                # tao node moi
                $infoTag = $root->createElement("Monhoc");
                $MakhTag = $root->createElement("Mamon",$this->Mamon);
                $TenkhTag = $root->createElement("Tenmon",$this->Tenmon);
                $DiachiTag = $root->createElement("SoTC",$this->SoTC);
                $infoTag->appendChild($MakhTag);
                $infoTag->appendChild($TenkhTag);
                $infoTag->appendChild($DiachiTag);
                // thay the node moi vao node cu
                $node->parentNode->replaceChild($infoTag,$node);
            }
            $root->formatoutput=true;	
            $root->save("Mon.xml");
        }

        public function Delete() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load("Mon.xml");
            $xpath = new DOMXPath($root);
            foreach($xpath->query("/qlmh/Monhoc[Mamon='$this->Mamon']") as $node) {
                $node->parentNode->removeChild($node);
            }
            $root->formatoutput=true;
            $root->save("Mon.xml");
        }
    }
?>