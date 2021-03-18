<?php
// destroy the session.
session_destroy();

print_r($_SESSION);
if (isset($_SESSION['username']))
{
    echo "set";
}
else
{
  echo "notset";
}
header("Location: ../Model/landing.php");
?>