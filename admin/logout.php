<?php
require "layout.part/admin.header.php";
session_destroy();
header( "refresh:3;url=index.php" );
echo "  <div class='loader_bg'>
            <div class='welcome'>
                <h2>Successfully Logged out! Redirecting to login...</h2>
            </div>
            <div class='loader mt-5'></div>
        </div>
    ";
exit();
?>