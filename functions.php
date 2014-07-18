<?php
/** Absolute path to the site directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
    
/**
 * Get current working directory
 *
 * @access public
 * @param none
 * @return string
 */
function curr_dir() {
  $curr_dir = explode("\\", ABSPATH);
  $curr_dir = "/" . $curr_dir[count($curr_dir)-1];
  return $curr_dir;
}

/**
 * Get base url of site
 *
 * @access public
 * @param $slug
 * @return string
 */
function base_url($slug = "") {
  $curr_dir = "/";
  if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $curr_dir = curr_dir();
  }
  
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['HTTP_HOST'],
    $curr_dir
  );
}

/**
 * Include header.php
 *
 * @access public
 * @param $page_title Title of the page
 * @return html
 */
function get_header( $page_title = "") {
    include("templates/header.php");
}

/**
 * Include footer.php
 *
 * @access public
 * @param $page_title Title of the page
 * @return html
 */
function get_footer() {
    include("templates/footer.php");
}

/**
 * Determine if current user is login or not
 *
 * @access public
 * @param none
 * @return boolean
 */
function is_login() {
    return ( isset( $_SESSION['user'] ) ) ? TRUE : FALSE;
}

/**
 * Get current login data
 *
 * @access public
 * @param none
 * @return object
 */
function get_user() {
    if ( is_login() ) {
        return (object) $_SESSION['user'];
    } else {
        return null;
    }
}