<?php
$this->js[] = "js/draw.js";
?>
<h3>Рисуем фигуры</h3>
<div class="draw">
	<canvas id="signature" width="200" height="150"></canvas>
	<div class="panel">
		<button id="rectangle" class="btn btn-default rectangle" data-param='{ "x1":20, "y1":20, "x2":150, "y2":100 }' type="submit">rectangle</button>
		<button id="circle" class="btn btn-default circle" data-param='{ "x1":100, "y1":75, "x2":50, "y2":0, "radian":2 }' type="submit">circle</button>
		<input type="number" value="2" class="form-control lineBorder">
		<input type="color" class="form-control colorBorder">
		<button class="btn btn-default add" type="submit">add</button>
		<button class="btn btn-default save" type="submit">save</button>
	</div>
	<div class="new_figure">
		<canvas id="obj" class="rectangle" width="200" height="150"></canvas>
		<form class="param">
			<label>name:</label>
			<input type="text" name="name" id="name" class="form-control"><br>
			<label>x1:</label>
			<input id="x1" name="x1" type="number" class="form-control" value="20"><br>
			<label>y1:</label>
			<input id="y1" name="y1" type="number" class="form-control" value="20"><br>
			<label>x2:</label>
			<input id="x2" name="x2" type="number" class="form-control" value="150"><br>
			<label>y2:</label>
			<input id="y2" name="y2" type="number" class="form-control" value="100"><br>
			<label class="radian">radian:</label>
			<input id="radian" name="radian" type="number" class="form-control" value="2" disabled><br>
			<button class="btn btn-default apply" type="button">apply</button>
			<button class="btn btn-default save" type="button">save</button>
		</form>
	</div>
</div>
