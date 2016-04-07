<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SZDU CMS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
	<div class="container">
		<h1 class="text-xs-center"> Vijesti </h1>
		<div class="form-group">
			<label for="sel1">Izaberi vijest:</label>
			<div class="row">
				<div class="col-md-10">
					<select class="form-control" id="sel1" placeholder="Izaberi vijest">
						<option>3</option>
						<option>2</option>
						<option>1</option>
					</select>
				</div>
				<div class="col-md-2">
					<div class="text-xs-center">
						<button type="button" class="btn btn-warning-outline" onclick="show()">Uredi</button>
						<button type="button" class="btn btn-danger-outline" onclick="">Izbriši</button>
					</div>
				</div>
			</div>
			<div class="text-xs-center">
				<button type="button" class="btn btn-primary-outline" onclick="show()">Nova vijest</button>
			</div>
		</div>		
	</div>
	<br />
	
	<div style="display: none;" class="container" id="forma">
		<form class="form-group" action="unos.php" method="POST" enctype="multipart/form-data">
	  	<input type="text" name="naslov" class="form-control" placeholder="Naslov"><br>
		<textarea class="form-control" placeholder="Tekst" id="editable"></textarea><br />
		<input type="file" name="fileToUpload" id="fileToUpload"> <br /><br />
		<input type="submit" value="Submit"><br>
		</div>
	</div>
	<br />
	
	<div class="container">
		<div class="panel panel-default">
			<!-- Table -->
			<table class="table">
				<thead>
				  <tr>
					<th>#</th>
					<th>Naslov</th>
					<th>Datum</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td>3</td>
					<td>Testna vijest</td>
					<td>07.04.2016.</td>
				  </tr>
				  <tr>
					<td>2</td>
					<td>Bomba u studentskom zboru!</td>
					<td>05.04.2016</td>
				  </tr>
				  <tr>
					<td>1</td>
					<td>ŠOKANTNO szdu izradu cms-a platio 1000€</td>
					<td>01.04.2016.</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
		
	<script>
		function show() {
			if(document.getElementById('forma').style.display == "none")
				document.getElementById('forma').style.display = "block";
			else
				document.getElementById('forma').style.display = "none";
		}
	</script>
</body>

</html>