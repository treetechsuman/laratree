<?php //session_start();
require_once('config/config.php');
require_once('system/classes/connection.class.php');
require_once('system/classes/service.class.php');

$migratinFolders = scandir(MigrationFolderPathForView);

$appFolders = glob(RepositoryFolderPathForView. '/*' , GLOB_ONLYDIR);

$modelFolders = scandir(ModelFolderPathForView);
//print_r($modelFolders);

 $old_table_name = isset($_SESSION['table_name'])?$_SESSION['table_name']:'';
 $old_no_of_fields = isset($_SESSION['no_of_fields'])?$_SESSION['no_of_fields']:'';
?>
<div class="col-md-3">
	<form action="system/process/repository/generate_repository.php" method="post" class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-5" for="repository">Repository:</label>
      <div class="col-sm-7">
        <input type="text" name="repository" value="<?php //echo $old_table_name; ?>" class="form-control" id="repository" placeholder="Enter repository name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-5" for="repository">Select Model:</label>
      <div class="col-sm-7">
      <?php foreach ($modelFolders as $file) { if($file !='.'&&$file!='..'){ ?>
        <div class="checkbox">
  			<label><input type="checkbox" name="model[]" value="<?php echo $file; ?>"><?php echo $file; ?></label>
		</div>
		<?php }} ?>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Generate</button>
      </div>
    </div>
</div>
<div class="col-md-4">
<ul>
	<li><i class="glyphicon glyphicon-folder-open"></i> Model</li>
	<ul>
	<?php foreach ($modelFolders as $file) { ?>
	  <li><i class="glyphicon glyphicon-file"></i> <?php echo $file; ?></li>
	<?php } ?>
	</ul>
</ul> 
	
</div>
<div class="col-md-5">
<ul>
	<li><i class="glyphicon glyphicon-folder-open"></i> migrations</li>
<?php foreach ($migratinFolders as $file) { ?>
	
	<ul>
	
		<li><i class="glyphicon glyphicon-file"></i>
			<?php echo $file; if( $file != '.' && $file != '..' ) {?>
			<a href="system/process/migration/delete_migration.php?file_name=<?php echo $file ?>" class="btn btn-danger btn-xs">
				<i class="glyphicon glyphicon-remove"></i>
			</a>
			<?php } ?>
		</li>
	</ul>
<?php } ?>
</ul>
<ul>
	<li><i class="glyphicon glyphicon-folder-open"></i> Model</li>
	<ul>
	<?php foreach ($modelFolders as $file) { ?>
	  <li><i class="glyphicon glyphicon-file"></i> 
	  <?php echo $file; if( $file != '.' && $file != '..' ) {?>
      <a href="system/process/migration/delete_model.php?file_name=<?php echo $file ?>" class="btn btn-danger btn-xs">
        <i class="glyphicon glyphicon-remove"></i>
      </a>
      <?php } ?>
      </li>
	<?php } ?>
	</ul>
</ul> 

<ul>
<?php foreach ($appFolders as $folder) { ?>
  <li><i class="glyphicon glyphicon-folder-open"></i> <?php echo $folder; ?></li>
  <ul>
  <?php 
    $files = scandir($folder);
    foreach ($files as $file) { ?>
    <li><i class="glyphicon glyphicon-file"></i>
      <?php echo $file; if( $file != '.' && $file != '..' ) {?>
      <a href="system/process/repository/delete_repository.php?file_name=<?php echo $folder.'/'.$file ?>" class="btn btn-danger btn-xs">
        <i class="glyphicon glyphicon-remove"></i>
      </a>
      <?php } ?>
      </li>
  <?php } ?>
  </ul>
<?php } ?>
</ul>
	
</div>