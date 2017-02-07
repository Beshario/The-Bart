

<!DOCTYPE html>
<html>
    <head>
      <title>THE BART</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApioeOrv_miHKPxw5YUJlRSd2PVG7sfbo&callback=initMap"
    async defer></script>
     
      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
      <script type="text/javascript" src="../model/data.js"></script>  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

      <link rel="stylesheet" href="main.css">

      <script type="text/javascript" src="../model/data.js"></script>  

    </head>
    
    <body onload="initMap();">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" style="color:#FFCC00;" href="#">BART</a>
            </div>
          </div>
    	</div>
    	<div class="jumbotron">
  		<div class="row">
   			<div class="col-md-8">
   				<div class="page-header">
   					<h1>Welcome to the Bart</h1>
    				<p>your public transit guide at the bay Area</p>
				</div> 
			</div>
			<div class="col-md-4">
	 			<img class="img-responsive" alt="bay map" src="http://www.bombardier.com/content/dam/Websites/bombardiercom/News/BT/Bombardier-Transportation-20140107-BART.jpg/_jcr_content/renditions/original">
			</div>
		</div>
	</div>
  <div class="container-fluid">
   <div class="row">
   <div class="col-md-4 col-sm-12">
    	<div class="panel panel-primary">
	    	<div class="panel-heading">
			   <h3 class="panel-title">SELECT ROUTE</h3>
			 </div>
	    	<div class="list-group">
	    					  
			</div>
	    </div>
    </div>
	   <div class="col-md-8 col-sm-12 iframe-container" ><div id="map_canvas"></div></div>
    
		</div>
		</div>
    </body>
</html>