<?php


function check_error()
{
    if(isset($_SESSION['error']) && $_SESSION['error'] != "")
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}

function check_success()
{
    if(isset($_SESSION['success']) && $_SESSION['success'] != "")
    {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
}

function check_alert()
{
    if(isset($_SESSION['alert']) && $_SESSION['alert'] != "")
    {
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
    }
}


function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function emptyCart()
{
    unset($_SESSION['cart']);
    unset($_SESSION['counter']);
    unset($_SESSION['total']);
}


function generatePDF($xmlFileName, $xslFileName, $pdfFileName)
{
    // Building & running the java program
    $output = shell_exec("cd " . ROOT_LOC . 'app/pdfGEN 2>&1 && .\gradlew build 2>&1 && .\gradlew run --args="'. $xmlFileName. ' ' . $xslFileName . ' ' . $pdfFileName . ' 2>&1');

    $pdfFile = ROOT_LOC . "public/uploads/" . $pdfFileName;
    show($pdfFile);
    $xmlFile = ROOT_LOC . 'app/pdfGEN/src/main/resources/' . $xmlFileName;
    //Define header information
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: 0");
    header('Content-Disposition: attachment; filename="'.basename($pdfFile).'"');
    header('Content-Length: ' . filesize($pdfFile));
    header('Pragma: public');
    flush();
    readfile($pdfFile);
    // Delete generated files from the server
    unlink($xmlFile);
    unlink($pdfFile);
}


