<?php
// includes/error_log.php
session_start();
header('Content-Type: text/plain');

// For security, restrict access if needed
if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') {
    die("Access denied");
}

// Display the last 20 lines of error log
$logPath = ini_get('error_log');
if (file_exists($logPath)) {
    echo "=== Last 20 Error Log Entries ===\n";
    echo `tail -n 20 $logPath`;
} else {
    echo "Error log not found at: $logPath";
}
?>