<?php
    session_start();
    session_destroy();
    header("location:../page/loginMekanik.php?pesan=logout");
?>