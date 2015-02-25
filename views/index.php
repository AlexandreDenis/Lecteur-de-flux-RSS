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
    <link href="../css/index.css" rel="stylesheet" media="screen" />
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
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="flux.php">Gestion des flux</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="container">
		<h3>Articles</h3>
	
		<!-- search bar -->
		<form class="form-search">
		  <div class="input-append">
			<input type="text" class="span2 search-query" style="width:80%;" />
			<button type="submit" class="btn">Search</button>
		  </div>
		</form>
		
		<!-- article data table -->
		<table class="table table-hover">
			<tbody>
				<!-- one article -->
				  <tr>
					<td>
						<a target="_blank" href="http://www.lemonde.fr/international/video/2015/02/25/pourquoi-la-coalition-ne-fait-pas-reculer-l-etat-islamique_4582818_3210.html"><h4>Pourquoi la coalition ne fait pas reculer l'Etat islamique</h4></a>
						<div class="descr-article">
							<p>A Vichy, dans l’Allier, toutes les demandes de logement social sont satisfaites en quinze jours. « Nous proposons des appartements dans des immeubles rénovés, au bord du lac », précise Frédéric Aguilera, l’adjoint au maire chargé de l’urbanisme. Avec 4 700 logements vides, soit 22 % de son parc, la ville thermale de 25 000 habitants est en effet championne de France de la vacance.</p>
						</div>
					</td>
				  </tr>
				<!-- one article -->
				  <tr>
					<td>
						<a target="_blank" href="http://www.lemonde.fr/logement/article/2015/02/23/ces-villes-minees-par-les-logements-vacants_4581607_1653445.html"><h4>Ces villes minées par les logements vacants</h4></a>
						<div class="descr-article">
							<p>Depuis septembre 2014, une coalition mise en place par les Etats-Unis combat l'Etat islamique. Pourquoi, après cinq mois, l'organisation terroriste maintient-elle son assise en Irak et en Syrie ? Quelle stratégie faut-il adopter ? L'engagement du porte-avions français Charles-de-Gaulle peut-il changer la donne ? Analyse de Christophe Ayad, chef adjoint du service international du Monde.</p>
						</div>
					</td>
				  </tr>
			</tbody>
		</table>
	</div>
    <script src="js/bootstrap.min.js"></script>
</body>  
</html>