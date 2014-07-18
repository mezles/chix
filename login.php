<?php
    // include database connection
    require_once( "db_connect.php" );
    
    // Check if any data is submitted
    if ( $_POST ) {
    
        // Verify if the actual form is submitted, checking the hidden field "action"
        if ( isset( $_POST['action'] ) && $_POST['action'] == "login" ) {
            
            // Check if username and password fields are submitted
            if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
                
                // remove spaces to username/password and assign it to variables
                $username = trim( $_POST['username'] );
                $password = trim( $_POST['password'] );
                
                // encrypt password, uses md5
                $encrypt_pass = md5($password);
                
                // username and password should not be empty
                if ( !empty( $username ) && !empty( $password ) ) {
                    $query = "SELECT `id`, `user_name` FROM `users` WHERE `user_name`=\"$username\" AND `password`=\"$encrypt_pass\" LIMIT 0,1";
                    $result = mysqli_query( $con, $query );
                    
                    // get row
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // check if row not empty
                    if ( $row ) {
                        
                        // save result to session
                        $_SESSION['user'] = array(
                            'id' => $row['id'],
                            'user_name' => $row['user_name']
                        );
                        
                        // redirect to index.php
                        header("Location:index.php");
                        exit();
                        
                    } else {
                        $error_msg = "Username and password not matched!";
                    }
                    
                } else {
                    $error_msg = " Username and password required!";
                }
                                
            } else {
                $error_msg = "Username and password field not submitted.";
            }
            
        }
        
    }
    
    //destroy session for error data
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php if ( isset( $error_msg ) ) : ?>
        <div class="alert alert-danger"><strong>Error:</strong> <?php echo $error_msg; ?></div>
        <?php endif; ?>
        <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <input type="hidden" name="action" value="login">
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
