<?php //session_start();
 //echo $_SESSION['no_of_fields'];
 $old_table_name = isset($_SESSION['table_name'])?$_SESSION['table_name']:'';
 $old_no_of_fields = isset($_SESSION['no_of_fields'])?$_SESSION['no_of_fields']:'';
  ?>
<div class="col-md-4">
   <form action="system/process/migration/push_in_session.php" method="post" class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-4" for="table">Table:</label>
      <div class="col-sm-8">
        <input type="text" name="table_name" value="<?php echo $old_table_name; ?>" class="form-control" id="table" placeholder="Enter table name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="no_of_fields">No of Fields:</label>
      <div class="col-sm-8">          
        <input type="number" name="no_of_fields" value="<?php echo $old_no_of_fields; ?>" class="form-control" id="no_of_fields" placeholder="No fo Fields">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Send</button>
      </div>
    </div>
  </form>
</div>
<div class="col-md-4">
  <form action="system/process/migration/generate_migration.php" method="post" class="form-horizontal">
    <?php
     if(isset($_SESSION['no_of_fields'])){
     	for($i=0;$i<$_SESSION['no_of_fields'];$i++){     
     ?>
	<div class="form-group">
      <label class="control-label col-sm-4" for="no_of_fields">Field Name:</label>
      <div class="col-sm-8">          
        <input type="text" name="field_name[]" class="form-control" id="no_of_fields" placeholder="Field Name" required>
        String<input type="radio" name="type[<?php echo $i; ?>]" value="string" checked="checked">
        Integer<input type="radio" name="type[<?php echo $i; ?>]" value="integer">
        Enum<input type="radio" name="type[<?php echo $i; ?>]" value="enum">
      </div>
    </div>
    <?php } } ?>
    <input type="hidden" name="table_name" value="<?php echo $old_table_name ?>">
    <input type="hidden" name="no_of_fields" value="<?php echo $old_no_of_fields ?>">
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
    
</div>