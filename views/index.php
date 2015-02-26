<?php require_once __DIR__.'/../controllers/ControllerOnLoadPageArticle.php'; ?>

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
              <li><a href="feed.php">Feed management</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

	<div class="container">
		<h3>Articles</h3>

		<!-- article data table -->
		<table class="table table-hover">
			<tbody>

                <?php foreach ($arrayArticle as &$value) {
    ?>

                    <tr>
                        <td>
                            <a target="_blank" href=<?php echo $value->getLink();
    ?> ><h4><?php echo $value->getTitle();
    ?></h4></a>
                            <?php echo $value->getDate();
    ?><br/><br/>
                            <div class="descr-article">
                                <p><?php echo $value->getDescription();
    ?></p>
                            </div>
                        </td>
                    </tr>

                <?php 
} ?>

			</tbody>
		</table>
	</div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
