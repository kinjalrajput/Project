<?php
  $button_text = "Add";

  $title = null;
  $id = null;
  $description = null;
  $action = "add";

  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    
    $app = new MyApp();

    $button_text = "Update";

    $action = strtolower($button_text);

    $record = $app->doQuery("SELECT * from `pages` where id=$id");   

    $title = $record['title'];

    $description = $record['description'];
  } 
?>
<form class="form-horizontal" method="post">
  <fieldset>            
    <div class="form-group">
      <label for="title" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-10">
        <input name="title" type="text" class="form-control" id="title" value="<?php echo $title; ?>">
      </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-lg-2 control-label">Description</label>
        <div class="col-lg-10">
          <textarea name="description" class="form-control" rows="3" id="description"><?php echo $description; ?></textarea>
		</div>
      </div>
     <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-primary">          
            <?php echo $button_text; ?>
          </button>
          <input type="hidden" name="action" value="<?php echo $action; ?>"> 
          <input type="hidden" name="id" value="<?php echo $id; ?>"> 
        </div>
      </div>
    </fieldset>            
  </form>