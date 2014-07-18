<?php

// include database connection
require_once( "db_connect.php" );
    
if ( is_login() ) {
    session_destroy();
}

header( "Location:login.php" );
exit();