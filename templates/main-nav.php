<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Chix Tracker</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Help</a></li>
        <?php if ( is_login() ) : ?>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Welcome <?php echo get_user()->user_name; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url(); ?>logout.php">Logout</a></li>
            </ul>                
        </li>
        <?php endif; ?>
      </ul>
      <form class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Search...">
      </form>
    </div>
  </div>
</div>