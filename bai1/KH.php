<?php 
    class Khachhang{
        private $Makh;
        private $Hoten;
        
        private $Diachi;
        
        public function __construct($Ma, $Ten, $Diachi){
            $this->Makh = $Ma;
            $this->Hoten = $Ten;
            $this->Diachi = $Diachi;
        }
        
        public function __destruct()
        {
            $this->Makh = "";
            $this->Hoten = "";
            $this->Diachi = "";
        }
        public function getMakh() { return $this->Makh; }
        public function getHoten() { return $this->Hoten; }
        public function getDiachi() { return $this->Diachi; }

        public function Add()
        {
            $root = new DomDocument("1.0","UTF-8");
            $root->load("Khachhang.xml");
            $rootTag = $root->getElementsByTagName("qlkh")->item(0);
            $infoTag = $root->createElement("Khachhang");
            $MakhTag = $root->createElement("Makh",$this->Makh);
            $TenkhTag = $root->createElement("Hoten",$this->Hoten);
            $DiachiTag = $root->createElement("Diachi",$this->Diachi);
            $infoTag->appendChild($MakhTag);
            $infoTag->appendChild($TenkhTag);
            $infoTag->appendChild($DiachiTag);
            $rootTag->appendChild($infoTag);
            $root->formatoutput=true;
            $root->save("Khachhang.xml");
        }

        public function Update() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load("Khachhang.xml");
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("/qlkh/Khachhang[Makh=$this->Makh]");
            foreach ($kq as $node) {
                # tao node
                $infoTag = $root->createElement("Khachhang");
                $MakhTag = $root->createElement("Makh",$this->Makh);
                $TenkhTag = $root->createElement("Hoten",$this->Hoten);
                $DiachiTag = $root->createElement("Diachi",$this->Diachi);
                $infoTag->appendChild($MakhTag);
                $infoTag->appendChild($TenkhTag);
                $infoTag->appendChild($DiachiTag);
                $node->parentNode->replaceChild($infoTag,$node);
            }
            $root->formatoutput=true;	
            $root->save("Khachhang.xml");
        }

        public function Delete() {
            $root = new DomDocument("1.0","UTF-8");
            $root->load("Khachhang.xml");
            $xpath = new DOMXPath($root);
            foreach($xpath->query("/qlkh/Khachhang[Makh=$this->Makh]") as $node) {
                $node->parentNode->removeChild($node);
            }
            $root->formatoutput=true;
            $root->save("Khachhang.xml");
        }
    }
?>