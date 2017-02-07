<? require_once('../includes/helper.php');
render('header', array('title' => 'THE BART'));
?>
   <div class="container-fluid">
   <div class="row">
   <div class="col-md-4 col-sm-12">
    	<div class="panel panel-primary">
	    	<div class="panel-heading">
			   <h3 class="panel-title">SELECT ROUTE</h3>
			 </div>
	    	<div class="list-group">
    					  <?php
		        foreach ($routes as $route)
		        {
		            ?>
		            <a href="#" class='list-group-item'
		            	onclick="addPolyline(<?php echo htmlspecialchars($route[2]); ?>); addMarkers(); showMarkers();" value="<?= $route[2]?>" color="<?= $route[3]?>">
		            <?php echo(htmlspecialchars($route[0]).' ('.htmlspecialchars($route[1]).')');?>
				</a><span class="badge"></span>
		            <?php
		        }
		        ?>
	    					  
			</div>
	    </div>
    </div>
	   <div class="col-md-8 col-sm-12 iframe-container" ><div id="map_canvas"></div></div>
    
		</div>
		</div>
<?php
render('footer');
?>