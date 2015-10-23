<h3>book</h3>

<table class="table table-bordered">
    <tr>
        <th>article_id</th>
        <th>article_title</th>
        <th>article_text</th>
        <th>article_created</th>
        <th>article_author</th>
    </tr>
    <?php foreach ($data as $items): ?>
        <tr>
            <td><?= $items['article_id'] ?></td>
            <td><?= $items['article_title'] ?></td>
            <td><?= $items['article_text'] ?></td>
            <td><?= $items['article_created'] ?></td>
            <td><?= $items['article_author'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
