<?php
$site_name = "My MD Blog";
$domain = "https://md.langezaal.io";
$description = "Welcome to my awesome blog!";

// Debug flag (true for development, false for production)
$debug = false;

if ($debug) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
} else {
    error_reporting(0);
    ini_set("display_errors", 0);
}
?>
