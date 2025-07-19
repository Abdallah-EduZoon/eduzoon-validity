<?php
$SECRET_KEY = "eduzoon_9381";

if (!isset($_GET['key']) || $_GET['key'] !== $SECRET_KEY) {
    die("Unauthorized");
}

// الباقة: بتاخدها من GET أو بتحددها يدوي
$package = isset($_GET['package']) ? (int)$_GET['package'] : 1;
$duration = $package * 60;

$path = $_SERVER['DOCUMENT_ROOT'] . "/validity.txt";

file_put_contents($path, "1");  // تفعيل الصلاحية
sleep($duration);               // الانتظار
file_put_contents($path, "0");  // انتهاء الصلاحية

echo "validity set to 1 for $duration seconds";
?>