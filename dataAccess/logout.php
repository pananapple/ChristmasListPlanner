<?php
session_start();
session_destroy();

header("Location: ../index.php?msg=2");
die();
?>
