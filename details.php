<?php

// include database connection
    require_once( "db_connect.php" );
    
    // Ensure that user is login, redirect to login page if user not login
    if ( !isset( $_SESSION['user'] ) ) {
        header( "Location:login.php" );
        exit();
    }
    
    
    $chix = array();
    
    // get chix data for edit chix
    if ( "edit_chix" === $_GET['action'] ) {
        $chix_id = (int) $_GET['id'];
        $sql = "SELECT * FROM `chix` WHERE `id` = $chix_id";
        $result = mysqli_query( $con, $sql );
        $chix = mysqli_fetch_array( $result, MYSQLI_ASSOC );
    }

    
    // Check if form is submitted
    if ( $_POST ) {
        
        // sanitize data
        $data = array_map("mysql_real_escape_string", $_POST);
        
        // for adding new chix
        if ( "add_new" === $_GET['action'] ) {
            $sql = "INSERT INTO `chix` (`name`, `description`, `fb`) VALUES ('$data[name]', '$data[description]', '$data[fb]')";
            
            $result = mysqli_query( $con, $sql );
            $last_id = mysqli_insert_id( $con ); // mysqli inserted id
            
            /**
             * Check if id is generated (should be greater than zero), meaning our mysql insert is successful
             */
            if ( $last_id !== NULL && is_numeric($last_id) && $last_id > 0) {
                // redirect to homepage
                header( "Location:index.php" );
                exit();
            } else {
                $form_is_error = TRUE;
                $error_msg = mysqli_error( $con );
            }
        } 
        // for editing existing chix
        elseif ( "edit_chix" === $_GET['action'] ) {
            
            // for saving
            if ( isset( $data['save'] ) ) {
                $sql = "UPDATE `chix` SET `name` = '$data[name]', `description` = '$data[description]', `fb` = '$data[fb]' WHERE `id` = $chix_id";
                $result = mysqli_query( $con, $sql );
                if ( $result ) {
                    // redirect to homepage
                    header( "Location:index.php" );
                    exit();
                } else {
                    $form_is_error = TRUE;
                    $error_msg = mysqli_error( $con );
                }
            } 
            // for deleting
            elseif ( isset( $data['delete'] ) ) {
                $sql = "DELETE FROM `chix` WHERE `id` = $chix_id";
                $result = mysqli_query( $con, $sql );
                if ( mysqli_affected_rows( $con ) > 0 ) {
                     // redirect to homepage
                    header( "Location:index.php" );
                    exit();
                } else {
                    $form_is_error = TRUE;
                    $error_msg = mysqli_error( $con );
                }
            }
        }
    }
?>
<?php get_header( "Details" ); ?>

    <?php include_once( "templates/main-nav.php" ); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 main">
          <h1 class="page-header">Add New Chix</h1>
          
          <?php if ( isset( $form_is_error ) && isset( $error_msg ) ) : ?>
          <div class="alert alert-danger" role="alert">
            <strong>Error!</strong> <?php echo $error_msg; ?>
          </div>
          <?php endif; ?>
          <div class="well">
            <form method="post" class="form-horizontal" role="form">
                <input type="hidden" name="action" value="<?php echo ( "edit_chix" === $_GET['action'] ) ? "edit" : "add"; ?>">
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="<?php echo ( isset( $chix['name'] ) ) ? $chix['name'] : ''; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Facebook Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fb" value="<?php echo ( isset( $chix['fb'] ) ) ? $chix['fb'] : ''; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description"><?php echo ( isset( $chix['description'] ) ) ? $chix['description'] : ''; ?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a class="btn btn-default" href="<?php echo base_url(); ?>">Cancel</a>
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                        <?php if ( "edit_chix" === $_GET['action'] ) : ?>
                        <button class="btn btn-danger" type="submit" name="delete" onClick="javascript:if(confirm('Are you sure?')){ return true;} else { return false;};">Delete</button>
                        <?php endif; ?>
                    </div>
                </div>
    
            </form>
          </div>
          
        </div>
      </div>
    </div>

<?php get_footer(); ?>