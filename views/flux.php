<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:f="http://java.sun.com/jsf/core"      
      xmlns:h="http://java.sun.com/jsf/html"
      xmlns:p="http://primefaces.org/ui" >
<head>
	<title>Feed Reader</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link href="../css/flux.css" rel="stylesheet" media="screen" />
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
</head>
<body>  
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Feed Reader</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li class="active"><a href="flux.php">Gestion des flux</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="container">
		<!-- Add a feed -->
		<h3>Add a feed</h3>
		<form class="form-inline" action='../controllers/Controller.php/testPost' name='add' method='post'>
			<div class="add-div">
			  <input type="text" class="input-small" placeholder="Feed URL" name="inputRss"/>
			  <button type="submit" class="btn">Add</button>
			</div>
		</form>
		
		<!-- list of feeds registered -->
		<h3>List of your feeds</h3>
		<table class="table table-hover">
			<thead>
                <tr>
                  <th></th>
				  <th>Feeds</th>
                </tr>
            </thead>
			<tbody>
				<!-- one feed -->
				<tr>
					<td>
						<label class="checkbox">
						  <input type="checkbox"/>
						</label>
					</td>
					<td>
						<a href="www.lemonde.fr/rss/">www.lemonde.fr/rss/</a>
					</td>
				</tr>
				<!-- one feed -->
				<tr>
					<td>
						<label class="checkbox">
						  <input type="checkbox"/>
						</label>
					</td>
					<td>
						<a href="www.bbc.co.uk/news/10628494">www.bbc.co.uk/news/10628494</a>
					</td>
				</tr>
			</tbody>
		</table>
		
		<!-- Buttons -->
		<form class="form-inline">
			<div class="delete-buttons">
			  <button type="submit" class="btn">Delete</button>
			  <button type="submit" class="btn">Delete all feeds</button>
			</div>
		</form>
	</div>
    <script src="js/bootstrap.min.js"></script>
</body>  
</html>