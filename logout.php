<?php

/*Troy Johnson
219-632-800
Assignment 01
*/
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;
?>
