<?php
require "../autoloader.php";
require "../../cache/database/database.php";
$UserUpdater = new UserUpdater(getDatabase());
$UserUpdater->logoutUser();
?>