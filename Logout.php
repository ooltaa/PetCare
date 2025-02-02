<?php
session_start();
session_unset();
session_destroy();

// Parandalon kthimin pas logout-it me butonin "Back"
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Ridrejton në index.php
header("Location: index.php");
exit();
?>

