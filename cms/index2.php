<?php
if (!isset($_SESSION["admin"])) {
	echo "<h1>Niste logirani</h1>";
	die();
}
session_start();
if (isset($_GET["logout"])) {	
        session_unset();
        session_destroy();
}
$username="szduhr_user";
$password="szdu123";
$database="szduhr_sz";
$link = mysqli_connect("localhost", $username, $password, $database);

if (!$link) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}

/* change character set to utf8 */
if (!mysqli_set_charset($link, "utf8")) {
	echo "Error loading character set utf8: ".mysqli_error($link);
	exit();
}

$sql = "SELECT id_vijest, naslov, tekst, url_slika FROM vijest WHERE izbrisan=0 ORDER BY id_vijest desc;";
$result= mysqli_query($link, $sql);
if(!$result)
{
	printf("Errormessage: %s\n", mysqli_error($link));
}

?>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">

			<!-- Logo -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">SZDU CMS</a>
			</div>

			<!-- Menu Items -->
			<div class="collapse navbar-collapse" id="mainNavBar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Vijesti</a></li>
					<li><a href="#">Članovi</a></li>
				</ul>
				<!--right align -->
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?logout=1">Logout</a></li>
				</ul>
			</div>

		</div>
	</nav>

	<div class="container">
		<h2 class="text-center"> Vijesti </h2>
		<div class="form-group">
			<div class="row">
				<div class="col-md-10">
					<select class="form-control" id="sel1" style="height:35px;">
						<option class="text-muted" select="selected">Izaberi vijest</option>
						<?php
						while($row = mysqli_fetch_assoc($result))
						{
							echo '<option>'.$row["naslov"].'</option>';
						}
						$sql = "SELECT id_vijest, naslov, tekst, url_slika, datum FROM vijest WHERE izbrisan=0 ORDER BY id_vijest desc;";
						$result= mysqli_query($link, $sql);
						if(!$rezultat)
						{printf("Errormessage: %s\n", mysqli_error($link));}
						?>
					</select>
				</div>
				<div class="col-md-1">
						<button type="button" class="btn btn-warning" onclick="show()">Uredi</button>
				</div>
				<div class="col-md-1">
						<button type="button" class="btn btn-danger" onclick="">Izbriši</button>
				</div>
			</div>
			<br />
			<div class="text-center">
				<button type="button" class="btn btn-primary" onclick="show()">Nova vijest</button>
			</div>
		</div>
		<hr />		
	</div>
	<br />
	<!-- Kraj Vijesi -->
	
	<div class="container" id="forma" style="display: none;">
		<form class="form-group" action="unos.php" method="POST" enctype="multipart/form-data">		
			<input type="text" name="naslov" class="form-control" placeholder="Naslov" style="height:35px;"><br />
			<input type="text" name="podnaslov" class="form-control" placeholder="Podnaslov" style="height:35px;"><br /><br />
			<div class="adjoined-bottom">
				<div class="grid-container">
					<div class="grid-width-100">
						<div id="editor">
						</div>
					</div>
				</div>
			</div>
			<input type="file" name="fileToUpload" id="fileToUpload"><br />
			<div class="text-center">
				<input type="submit" value="Submit"><br />
			</div>
		</form>
	</div>
	<br />
	<!-- Kraj Forme -->

	<div class="container">
		<div class="panel panel-default">
			<!-- Table -->
			<table class="table">
				<thead>
				  <tr>
					  <th>#</th>
					  <th>Naslov</th>
					  <th>Autor</th>
					  <th>Datum</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				while($row = mysqli_fetch_assoc($result))
				{
					echo '<tr>';
					echo '<td>'.$row["id_vijest"].'</td>';
					echo '<td>'.$row["naslov"].'</td>';
					echo '<td>ovdje autor</td>';
					echo '<td>'.$row["datum"].'</td>';
					echo '</tr>';
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Kraj Tablice -->

<!-- js -->
<script>
	initSample();
</script>

<script>
	function show() {
		if(document.getElementById('forma').style.display == "none")
			document.getElementById('forma').style.display = "block";
		else
			document.getElementById('forma').style.display = "none";
	}
</script>

</body>
