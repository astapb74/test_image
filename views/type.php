<h3>type file</h3>

<table class="table table-bordered">
    <tr>
        <th>type</th>
        <th>value</th>
    </tr>
    <?php foreach ($data as $items): ?>
        <tr>
            <td><?= $items['type'] ?></td>
            <td><?= $items['value'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>