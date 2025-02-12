<?php
session_start();
session_destroy();
echo "You have logged out: <a href='log_in.php'>LOG IN</a>";
exit;
?>