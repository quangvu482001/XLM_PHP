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
        $Ma = $_GET["ma1"];
        $Tenmon = $_GET["ht1"];
        $SoTC = $_GET["gt1"];
        require 'Mon.php';
        
        if (isset($_POST["Xem"])) {
            $ob = new Monhoc(0,0,0);
            $ob->Load();
        }
        if (isset($_POST["Add"])) {
            $Ma = $_POST["Mamon"];
            $Ten = $_POST["Tenmon"];
            $SoTC = $_POST["SoTC"];
            $ob = new Monhoc($Ma,$Ten,$SoTC);
            $ob->Add();
        }
        if (isset($_POST["Update"])) {
            $Ma = $_POST["Mamon"];
            $Ten = $_POST["Tenmon"];
            $SoTC = $_POST["SoTC"];
            $ob = new Monhoc($Ma,$Ten,$SoTC);
            $ob->Update();
        }
        if (isset($_POST["Delete"])) {
            $Ma = $_POST["Mamon"];
            $Ten = $_POST["Tenmon"];
            $SoTC = $_POST["SoTC"];
            $ob = new Monhoc($Ma,$Ten,$SoTC);
            $ob->Delete();
        }
    ?>
    <form method="POST" action="Capnhat_monhoc.php">
        Ma mon <input type="text" name="Mamon" value="<?php echo $Ma;?>"><br>
        Ten mon <input type="text" name="Tenmon" value="<?php echo $Tenmon;?>"><br>
        So TC <input type="text" name="SoTC" value="<?php echo $SoTC;?>"><br>
        <input type="submit" name="Add" value="Insert">
        <input type="submit" name="Update" value="Update">
        <input type="submit" name="Delete" value="Delete">
        <input type="submit" name="Xem" value="View">
    </form>
</body>

</html>