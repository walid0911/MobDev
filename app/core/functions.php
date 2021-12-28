<?php


function check_error()
{
    if(isset($_SESSION['error']) && $_SESSION['error'] != "")
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}


function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}


function generatePDF($xmlFileName, $xslFileName, $pdfFileName)
{
    // Building & running the java program
    show(ROOT_LOC);
    $output = shell_exec("cd " . ROOT_LOC . 'app/pdfGEN 2>&1 && .\gradlew run --args="'. $xmlFileName. ' ' . $xslFileName . ' ' . $pdfFileName . ' 2>&1');

    $pdfFile = ROOT_LOC . "public/uploads/" . $pdfFileName;
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