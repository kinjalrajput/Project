<?php
session_start();
session_destroy();
header("location:session2.php");
?>