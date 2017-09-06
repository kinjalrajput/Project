<?php
  define("PAGE_TITLE","PAGES");
  include("common/header.php"); // add header content like menus
  include("class/class.php"); // add class file

  $app = new MyApp(); 
   
?>
<div class="container">
  <?php
    
    $keyword = null;
    $data = array();

    //When I will do search.
    if(isset($_REQUEST['search']) && !empty($_REQUEST['search']))
    {
    	$keyword = trim($_REQUEST['search']);

    	// assigning keyword to class variable
    	$app->search_keyword = $keyword; 

    	//find results.
    	$data = $app->search($keyword);

    }
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "add")
    {
         $app->form_data = $_REQUEST;
         $app->store();
    }
    else
    {
        $data = $app->pages();
    }
	
    displayMsg();
  ?>
<form class="form-horizontal" method="post">
  <fieldset>
    <div class="form-group pull-right">
      <label for="search" class="col-lg-3 control-label">Search</label>
      <div class="col-lg-12">        
        <input name="search" type="text" class="form-control" id="search" placeholder="Type your keyword here..." value="<?php echo $keyword; ?>">
        <button type="submit" class="btn btn-primary pull-right" style="margin-top:5px;"><i class="fa fa-search" aria-hidden="true"></i> Go</button>
      </div>
	  </div>
	   <div class="form-group pull-left">
	   <h2>Add Data</h2>
      <div class="col-lg-12">                
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addPages" >
          <i class="fa fa-plus-circle" aria-hidden="true" ></i> Add
        </button>        
      </div>
    </div>     
   </fieldset>
</form>
<table class="table table-striped table-hover ">
	<thead>
		<tr>
		<th>#</th>
		<th>Title</th>		
		<th>Description</th>		
		<th>Actions</th>    
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($data as $page)
			{
				echo "<tr>
						<td>".$page['id']."</td>   
						<td>".$page['title']."</td>		
						<td>".$page['description']."</td>   
						<td><a href='edit_pages.php?id=".$page['id']."' class='btn btn-success'>EDIT</a></td>		
						<td><a href='delete_pages.php?id=".$page['id']."' class='btn btn-danger'>DELETE</a></td>    
					</tr>";	
			}
			if(count($data) == 0)
			{
				echo "<tr>
						<td align='center' colspan='3'><b>No results found.</b></td>						
					</tr>";		
			}
		?>			
	</tbody>
</table>
</div>

<?php
    include "add_pages.php";
?>