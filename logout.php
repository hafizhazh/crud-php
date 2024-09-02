<?php

session_start();

 if (!isset($_SESSION["login"])) {
      echo "<script>
      alert('login lah boy');
          document.location.href ='login.php';
      </script>";
      exit;
 }
//kosongkan data session user login
$_SESSION = [];

session_unset();
session_destroy();

header("location: login.php");