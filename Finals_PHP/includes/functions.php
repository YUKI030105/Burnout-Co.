<?php
// includes/functions.php

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function send_email($to, $subject, $message) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@burnoutco.com" . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        return true;
    } else {
        return false;
    }
}
?>