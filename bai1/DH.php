<?php 
    class Donhang{
        private $Makh;
        private $Mahang;
        
        private $Tenhang;

        private $Dongia;
        
        public function __construct($Makhach, $Mahang, $Tenhang, $Dongia){
            $this->Makh = $Makhach;
            $this->Mahang = $Mahang;
            $this->Tenhang = $Tenhang;
            $this->Dongia = $Dongia;
        }
        
        public function __destruct()
        {
            $this->Makh = "";
            $this->Mahang = "";
            $this->Tenhang = "";
            $this->Dongia = "";
        }
        public function getMakh() { return $this->Makh; }
        public function getMahang() { return $this->Mahang; }
        public function getTenhang() { return $this->Tenhang; }
        public function getDongia() { return $this->Dongia; }

        public function Add()
        {
            $root = new DomDocument("1.0","UTF-8");
            $root->load("Donhang.xml");
            $rootTag = $root->getElementsByTagName("qldh")->item(0);
            $infoTag = $root->createElement("Donhang");
            $MakhTag = $root->createElement("Makh",$this->Makh);
            $MahangTag = $root->createElement("Mahang",$this->Mahang);
            $TenhangTag = $root->createElement("Tenhang",$this->Tenhang);
            $DongiaTag = $root->createElement("Dongia",$this->Dongia);
            $infoTag->appendChild($MakhTag);
            $infoTag->appendChild($MahangTag);
            $infoTag->appendChild($TenhangTag);
            $infoTag->appendChild($DongiaTag);
            $rootTag->appendChild($infoTag);
            $root->formatoutput=true;
            $root->save("Donhang.xml");
        }

        public function Update() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load("Donhang.xml");
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("/qldh/Donhang[Mahang='$this->Mahang']");
            foreach ($kq as $node) {
                # tao node
                $infoTag = $root->createElement("Donhang");
                $MakhTag = $root->createElement("Makh",$this->Makh);
                $MahangTag = $root->createElement("Mahang",$this->Mahang);
                $TenhangTag = $root->createElement("Tenhang",$this->Tenhang);
                $DongiaTag = $root->createElement("Dongia",$this->Dongia);
                $infoTag->appendChild($MakhTag);
                $infoTag->appendChild($MahangTag);
                $infoTag->appendChild($TenhangTag);
                $infoTag->appendChild($DongiaTag);

                // thay the node moi vao node cu
                $node->parentNode->replaceChild($infoTag,$node);
            }
            $root->formatoutput=true;	
            $root->save("Donhang.xml");
        }

        public function Delete() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load("Donhang.xml");
            $xpath = new DOMXPath($root);
            echo $this->Mahang;
            $kq = $xpath->query("//Donhang[Mahang='$this->Mahang']");
            foreach($kq as $node) {
                $node->parentNode->removeChild($node);
            }
            $root->formatoutput=true;
            $root->save("Donhang.xml");
        }
    }
?>