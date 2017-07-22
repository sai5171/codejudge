<?php
	session_start();
    $_SESSION['message']="You have been successfully logged out from Cse Arena";
    header("location: home");
?>
