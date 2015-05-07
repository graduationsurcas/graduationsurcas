<?php

if (isset($_GET["qrdata"])) {
    header('Content-Type: image/png');
    include "qrlib.php";
    if (isset($_GET["save"]) && isset($_GET["qrtitle"])) {
        
        header('Content-Disposition: Attachment;filename=' . $_GET["qrtitle"] . '_QR.png');
    }
    QRcode::png($_GET["qrdata"], false, QR_ECLEVEL_L, 12, 1);
}
