<?php
require '../conexion/conexion.php';
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM certificado_captura WHERE id=$id";
    $result = mysqli_query($conexion, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'subidas/' . $file['name'];

    if (!file_exists($filepath)) {
        echo "string";


    }else{
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('subidas/' . $file['name']));
        readfile('subidas/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE certificado_captura SET downloads=$newCount WHERE id=$id";
        mysqli_query($conexion, $updateQuery);
        exit;
    }
}
?>