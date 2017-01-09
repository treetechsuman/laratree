<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php?menu=home"><?php echo AppName; ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php if($_SESSION['menu']==''||$_SESSION['menu']=='home'){?> class="active" <?php } ?> >
      	<a href="index.php?menu=home">
      		Home
      	</a>
      </li>
      <li <?php if($_SESSION['menu']=='migration'){?> class="active" <?php } ?> >
      	<a href="index.php?menu=migration&action=create">
      		Create Migration
      	</a>
      </li>
      
    </ul>
  </div>
</nav>