<?php

if (isset($_GET["qrfor"]) && isset($_GET["qrtitle"])) {
    
    $link;
    switch ($_GET["qrfor"]) {
        case "place":
            $link = "http://linc.com?placeid=".$_GET['placeid'];
            break;
        default:
            break;
    }
    
    header('Content-Disposition: Attachment;filename=' . $_GET["qrtitle"] . '_QR.png');
    header('Content-Type: image/png');

    require_once 'vendor/autoload.php';
    $qrCode = new Endroid\QrCode\QrCode();
    $qrCode->setText($link);
    $qrCode->setSize(300);
    $qrCode->setErrorCorrection('low');
    $qrCode->setPadding(10);
    $qrCode->render();
}
