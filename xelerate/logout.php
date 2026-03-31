<?php
require_once __DIR__ . "/includes/site.php";

if (session_status() !== PHP_SESSION_ACTIVE) {
  @session_start();
}

unset($_SESSION["demo_user"]);

$base = $basePath ?? "";
header("Location: " . $base . "/login.php");
exit;

