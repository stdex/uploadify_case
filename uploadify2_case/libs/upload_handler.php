<?php

header('Content-Type: text/html; charset=utf-8');
$rootpath = dirname(dirname(__FILE__));
$upload_dir = '/img/';
$targetPath = $rootpath . $upload_dir;

$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "test";
$images_table = "zz_images";

MYSQL_CONNECT($hostname,$username,$password) OR DIE("Не могу создать соединение ");
@mysql_select_db("$dbName") or die("Не могу выбрать базу данных ");
mysql_query("SET NAMES 'utf8'");

try {

    $file_name = $_FILES['Filedata']['name'];
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetFile = str_replace("//", "/", $targetPath) . $file_name;
    $fileParts = pathinfo($_FILES ['Filedata']['name']);
    $extension = $fileParts['extension'];
    
    move_uploaded_file($tempFile, $targetFile);
    
    $sql = "SELECT max(code) as max_code FROM $images_table LIMIT 1";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $new_code = $row['max_code']+1;
    
    $filename = pathinfo($file_name, PATHINFO_FILENAME);
    $filepath = $upload_dir.$file_name;

    $sql = "INSERT INTO $images_table (`filename`, `type`, `code`, `filepath`) VALUES ('$filename', '4', '$new_code', '$filepath')";
    $result = mysql_query($sql);
    
    if ($result) {
        echo "1";
    } else {
        echo "0";
    }

} catch (Exception $ex) {
    echo "0";
}

