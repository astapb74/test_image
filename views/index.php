<table class="table table-bordered">
	<tr>
		<th>id</th>
		<th>img</th>
		<th>path</th>
	</tr>
	<?php foreach ($data as $items): ?>
		<tr>
			<td><?= $items['id'] ?></td>
			<td><img src="<?= $items['path'] ?>"></td>
			<td><?= $items['path'] ?></td>
		</tr>
	<?php endforeach; ?>
</table>