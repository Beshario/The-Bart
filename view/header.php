

<!DOCTYPE html>
<html>
    <head>
      <title><?= htmlspecialchars($title)?></title>
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
       
       <nav class="navbar navbar-inverse navbar-fixed-top" style="right: 0; left: 0;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="color:#FFCC00;">THE BART</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#" data-toggle="modal" data-target="#myModal" style="color:#FFCC00;">About the Project</a></li>
        <li> <a href="../../../index.php#portfolio" style="color:#FFCC00;">Back to Portfolio</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
		</ul>
   
   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">About This Project</h4>
      </div>
      <div class="modal-body">
This project is part of an audited online course: BUILDING DYNAMIC WEBSITES by Harvard University
	  
		  <h4>PROBLEM</h4>
The mission for this project is to implement The Bart, a mashup that allows users to visualize BART routes on a Google Map and also click stations to see when the next trains depart (or arrive).<br><br>

		 The homepage must provide the user with a method of choosing one BART route at a time. Once selected, a route should is drawn as polylines on the map based on inputs from the BART server, in the route’s official color, with markers representing each of that route’s stations. Each station, when clicked, triggers an info window that summarizes the next Trains departing from (or arriving at) that station. <bold>


		  <large>TECHNOLOGIES USED</large>
		  <ul>
			  <li>XML</li>
			  <li>php</li>
			  <li>Javascript- Jquery</li>	
			  <li>Ajax, XML and JSON were used</li>
			  <li>Third party API</li>
		  </ul>


   
   
   
    <h5>If you would like to know more about the specifications of school project, please click <a href="http://cdn.cs75.net/2012/summer/projects/2/project2.pdf" target="_blank">HERE</a> </h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

       
    	<div class="jumbotron">
    	<div class="container">
  		<div class="row">
   			<div class="col-md-8 col-sm-12 ">
   				<div class="page-header">
   					<h1>Welcome to the Bart</h1>
    				<p>your public transit guide at the bay Area</p>
				</div> 
			</div>
			<div class="col-md-4 col-sm-12">
	 			<img class="img-responsive" alt="bay map" src="http://www.bombardier.com/content/dam/Websites/bombardiercom/News/BT/Bombardier-Transportation-20140107-BART.jpg/_jcr_content/renditions/original">
			</div>
		</div>
			</div>
	</div>