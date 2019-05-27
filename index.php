<!-- Written by Lamhot Simamora -->
<!-- lamhotsimamora36@gmail.com -->
<!-- 26 Mei 2019 -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Angka Romawi | Roman Number</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="asset/download.js" type="text/javascript"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<br>
	<div class="container">
		<button type="button" onclick="goToGithub();" class="btn btn-outline-dark btn-sm"><i class="fa fa-github" aria-hidden="true"> Github</i></button>
		<button type="button" onclick="goToFork();" class="btn btn-outline-dark btn-sm"><i class="fa fa-code-fork" aria-hidden="true"> Fork</i></button>

		<br><br>
	</div>

	<div class="container" id="romawi">

		<div class="card">
		  <div class="card-body">
		  	<div class="alert alert-success" role="alert">
		  <span class="badge badge-light">
		  	<h4>
		  		Angka Romawi :  <strong style="color: red">{{ hasil_romawi }}</strong>
		  	</h4>
		  </span>
		</div>
		<hr>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon3">Angka</span>
				  </div>
				  <input type="number" id="txt_angka" class="form-control" aria-describedby="basic-addon3">
				</div>
				<button type="button" @click="romawi" class="btn btn-outline-danger btn-sm">Romawi</button>
				<button type="button" @click="clear" class="btn btn-outline-success btn-sm">Clear</button>
		  </div>
		</div>
	</div>	
	<br>
	<div class="container" id="table">
<div v-if="display" class="alert alert-danger" role="alert">
  {{ message }}
</div>
		<div class="card">
		<div class="card-body">
			<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon3">From 1 to </span>
				  </div>
				  <input type="number" id="txt_limit" class="form-control" aria-describedby="basic-addon3">
				</div>
		<button type="button" @click="generateAuto" class="btn btn-outline-danger btn-sm">Auto Generate </button> 
		<button type="button" @click="saveToJson" class="btn btn-outline-primary btn-sm">Save to JSON</button>
		<button type="button" @click="clear" class="btn btn-outline-success btn-sm">Clear</button>
		<br><br>
		<div class="table-responsive">
		  <table class="table table-bordered table-sm table-dark">
			  <thead>
			    <tr>
			      <th scope="col" class="bg-info">
			      	<center>Angka</center>
			      </th>
			      <th scope="col">
			      	<center>Romawi</center>
			      </th>
			    </tr>
			  </thead>
			  <tbody>
				    <tr v-for="data in romawi_randoms">
					      <td scope="row" class="bg-info">
					      	<center>{{ data.angka }} </center>
					      </td>
					      <td><center>{{ data.romawi }}</center> </td>
				    </tr>
			  </tbody>
		  </table>
		</div>
		</div>
		</div>
	</div>
	
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script src="app.js"></script>
</html>
