<?php
session_start();
session_destroy();
header('Location:homeController.php', true, 302);
?>