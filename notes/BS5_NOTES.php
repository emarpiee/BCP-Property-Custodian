<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test</title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
</head>
<body>
	<p class="display-3">Display 3</p>

	<hr>

	<!-- button outline -->
	<button class="btn btn-outline-secondary">Button</button>
	<button class="btn btn-outline-primary">Button</button>
	<button class="btn btn-outline-danger">Button</button>

	<hr>

	<!-- button group -->
	<div class="btn-group">
		<button class="btn btn-outline-secondary">Button</button>
		<button class="btn btn-outline-primary">Button</button>
		<button class="btn btn-outline-danger">Button</button>
	</div>

	<hr>
	<!-- margin-padding m/p-(1-5, small to large) -->
	<div class="bg-primary text-white m-1 p-1">1 margin and paddng</div>
	<div class="bg-primary text-white m-2 p-2">2 margin and paddng</div>
	<div class="bg-primary text-white m-3 p-3">3 margin and paddng</div>
	<div class="bg-primary text-white m-4 p-4">4 margin and paddng</div>
	<div class="bg-primary text-white m-5 p-5">5 margin and paddng</div>

	<!-- margin padding direction, y=up and down, x=left and right -->
	<!-- mb(margin bottom), mt(margin top), ms (margin star/left), me(margin end/right) -->
	<div class="bg-primary text-white my-3 px-5">margin-padding direction x and y</div>
	<div class="bg-primary text-white mt-5 mb-1 pt-5 pb-1">margin-padding mt5 mb1 pt5 pb1</div>

	<hr>


	<!-- CONTAINERS -->


	<div class="container my-5"> <!-- HAS FIXED WIDTH -->
		<p>Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Cum fugiat alias, quasi quia hic minus est libero quam inventore molestiae blanditiis eligendi, natus odit, facilis ipsum nihil magni consectetur amet.</p>
		<h2>container</h2>
	</div>
	<div class="container-fluid"> <!-- 100% WIDTH -->
		<p>Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Cum fugiat alias, quasi quia hic minus est libero quam inventore molestiae blanditiis eligendi, natus odit, facilis ipsum nihil magni consectetur amet.</p>
		<h2>container-fluid</h2>
	</div>
	<div class="container-lg my-5"> <!-- 100% WIDTH until large screen -->
		<p>Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Cum fugiat alias, quasi quia hic minus est libero quam inventore molestiae blanditiis eligendi, natus odit, facilis ipsum nihil magni consectetur amet.</p>
		<h2>container-lg, 100% width until lg screen, then container</h2>
	</div>
	<div class="container-lg"> <!-- 100% WIDTH until extra large screen -->
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis molestias inventore rerum enim veritatis culpa quasi ducimus illum, possimus recusandae unde pariatur aliquam earum maiores! Eaque consequuntur commodi rem, quidem?</p>
		<h2>container-xl, 100% wdith until xl screen, then container</h2>
	</div>
	<!-- CONTAINER END -->


	<hr>

	<!-- GRID -->
	<!-- TAKES 12 COLUMNS EACH ROW -->
	<div class="container-lg my-5">
		<h2>Basic Grid</h2>
		<div class="row">
			<div class="col">
				<div class="p-5 bg-primary text-light">col1</div>
			</div>
			<div class="col">
				<div class="p-5 bg-primary text-light">col2</div>
			</div>
			<div class="col">
				<div class="p-5 bg-primary text-light">col3</div>
			</div>
			<div class="col">
				<div class="p-5 bg-primary text-light">col4</div>
			</div>
		</div>
	</div>

	<hr>

	<div class="container-lg my-5">
		<h2>Column Width</h2>
		<div class="row">
			<div class="col-3">
				<div class="p-5 bg-primary text-light">col1</div>
			</div>
			<div class="col-3">
				<div class="p-5 bg-primary text-light">col2</div>
			</div>
			<div class="col-3">
				<div class="p-5 bg-primary text-light">col3</div>
			</div>
			<div class="col-3">
				<div class="p-5 bg-primary text-light">col4</div>
			</div>
		</div>
	</div>

	<hr>

	<div class="container-lg my-5">
		<h2>Responsive Column Width</h2>
		<div class="row">
			<div class="col-sm-4 col-6"><!-- TAKE 6 COLUMN ON NORMAL SCREEN UNTIL SMAMLL SCREEN THEN TAKE 4 COLUMNS -->
				<div class="p-5 bg-primary text-light">col1</div>
			</div>
			<div class="col-sm-4 col-lg-3">
				<div class="p-5 bg-primary text-light">col2</div>
			</div>
			<div class="col-sm-4 col-lg-3">
				<div class="p-5 bg-primary text-light">col3</div>
			</div>
		</div>
	</div>

	<hr>

	<div class="container-lg my-5">
		<h2>Justify Column</h2>
		<div class="row justify-content-between"> <!-- justify-content-between/start/end/center -->
			<div class="col-4 col-md-1"> <!-- TAKE 4 COL UNTIL MEDIUM SCREEN THEN TAKE 1 COL -->
				<div class="p-5 bg-primary text-light">col1</div>
			</div>
			<div class="col-4 col-md-1">
				<div class="p-5 bg-primary text-light">col1</div>
			</div>
			<div class="col-4 col-md-1">
				<div class="p-5 bg-primary text-light">col1</div>
			</div>
		</div>
	</div>

	<!-- GRID END -->
</body>
</html>