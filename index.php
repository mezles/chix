<?php
    // include database connection
    require_once( "db_connect.php" );
    
    // Ensure that user is login, redirect to login page if user not login
    if ( !isset( $_SESSION['user'] ) ) {
        header( "Location:login.php" );
        exit();
    }
    
    $all_chix = array();
    
    $sql = "SELECT * FROM `chix`";
    
    $results = mysqli_query( $con, $sql );
    while( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC ) ) {
        $all_chix[] = $row;
    }
?>

<?php get_header( "Dashboard Template for Bootstrap" ); ?>

    <?php include_once( "templates/main-nav.php" ); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 main">
          <h1 class="page-header">Mga Chix</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="assets/images/ellen_adarna.jpg" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Ellen Adarna</h4>
              <span class="text-muted">happy girls are the prettiest :)</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="assets/images/kristel.jpg" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Kristel Mae Taburnal</h4>
              <span class="text-muted">I do my thing and you do yours.</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="assets/images/jan_claude.jpg" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Jan Claudine Viterbo</h4>
              <span class="text-muted">I am born to be real, not to be perfect.</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="assets/images/danica.jpg" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Danica Gelig</h4>
              <span class="text-muted">When you feel sad, DANCE.</span>
            </div>
          </div>

          <h2 class="sub-header">Lista sa mga chix</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th><a href="<?php echo base_url(); ?>details.php?action=add_new" title="Add New"><i class="glyphicon glyphicon-plus-sign"></i></a></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach( $all_chix as $chix ) : ?>
                <tr>
                  <td><a href="<?php echo $chix['fb']; ?>" target="_blank"><?php echo $chix['name']; ?></a></td>
                  <td><?php echo $chix['description']; ?></td>
                  <td><a href="<?php echo base_url(); ?>details.php?action=edit_chix&id=<?php echo $chix['id']; ?>" title="Edit Chix"><i class="glyphicon glyphicon-pencil"></i></a></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<?php get_footer(); ?>
