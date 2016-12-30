<!DOCTYPE html>
<html>
  <?php $this->output('admin/header');?>
  <body class="hold-transition skin-green fixed sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
	  <?php $this->output('admin/main_header');?>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <?php $this->output('admin/sidebar');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $subtitle;?>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
		
		<?php $this->output($konten);?>
		
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
	 <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->
	
    <?php $this->output('admin/footer');?>
  </body>
</html>
