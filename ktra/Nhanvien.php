<?php 
class nhanvien
{
    private $manv;
    private $hoten;

    private $gioitinh;

    private $ngaysinh;

    private $diachi;

public function __construct($Ma,$Ten,$Gioitinh,$Ngaysinh,$Diachi)
{
    $this->Manv = $Ma;
    $this->Hoten = $Ten;
    $this->Gioitinh = $Gioitinh;
    $this->Ngaysinh = $Ngaysinh;
    $this->Diachi = $Diachi;
}

public function __destruct()
{
    $this->Manv = "";
    $this->Hoten = "";
    $this->Gioitinh = "";
    $this->Ngaysinh = "";
    $this->Diachi = "";
}

public function getManv()
{
    return $this->Manv;
}

public function getHoten()
{
    return $this->Hoten;
}

public function getGioitinh()
{
    return $this->Gioitinh;
}

public function getNgaysinh()
{
    return $this->Ngaysinh;
}
public function getDiachi()
{
    return $this->Diachi;
}

public function Add(){
    $root = new DomDocument("1.0");
    $root->load('Nhanvien.xml');
    $rootTag = $root->getElementsByTagName("QLNS")->item(0);
    $infoTag = $root->createElement("nhanvien");
    $ManvTag = $root->createElement("Manv",$this->Manv);
    $HotenTag = $root->createElement("Hoten",$this->Hoten);
    $GioitinhTag = $root->createElement("Gioitinh",$this->Gioitinh);
    $NgaysinhTag = $root->createElement("Ngaysinh",$this->Ngaysinh);
    $DiachiTag = $root->createElement("Diachi",$this->Diachi);

    $infoTag ->appendChild($ManvTag);
    $infoTag -> appendChild($HotenTag);
    $infoTag -> appendChild($GioitinhTag);
    $infoTag -> appendChild($NgaysinhTag);
    $infoTag -> appendChild($DiachiTag);

    $rootTag -> appendChild($infoTag);
    $root->formatOutput=true;
    $root->save('Nhanvien.xml');
}

public function Update(){
    $root = new DomDocument("1.0","UTF-8");
    $root->load('Nhanvien.xml');
    $xpath = new DOMXPath($root);
    $kq = $xpath->query("/QLNS/nhanvien[Manv=$this->Manv]");
    foreach($kq as $node) {
        // Create
        $infoTag = $root->createElement("nhanvien");
        $ManvTag = $root->createElement("Manv",$this->Manv);
        $HotenTag = $root->createElement("Hoten",$this->Hoten);
        $GioitinhTag = $root->createElement("Gioitinh",$this->Gioitinh);
        $NgaysinhTag = $root->createElement("Ngaysinh",$this->Ngaysinh);
        $DiachiTag = $root->createElement("Diachi",$this->Diachi);
        $infoTag ->appendChild($ManvTag);
        $infoTag -> appendChild($HotenTag);
        $infoTag -> appendChild($GioitinhTag);
        $infoTag -> appendChild($NgaysinhTag);
        $infoTag -> appendChild($DiachiTag);

        $node->parentNode->replaceChild($infoTag,$node);
        $root->save("Nhanvien.xml");
    }
}

public function Delete()
{
    $root = new DomDocument("1.0");
    $root->load('Nhanvien.xml');
    $xpath = new DOMXPath($root);
    $kq = $xpath->query("/QLNS/nhanvien[Manv=$this->Manv]");
    foreach($kq as $node) {
        $node->parentNode->removeChild($node);
    }
    $root->formatOutput=true;
    $root->save('Nhanvien.xml');
}
}
?>
?>