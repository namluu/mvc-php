<?php $title = 'Post' ?>

<?php ob_start() ?>
<h1>Posts</h1>
<p>hello from the index action in Post controller</p>
<ul>
    <?php foreach($posts as $post): ?>
        <li>
            <h2><a href="/post/<?= $post['id'] ?>/view/"><?= $post['title'] ?></a></h2>
            <p><?= $post['content'] ?></p>
        </li>
    <?php endforeach ?>
</ul>
<?php $content = ob_get_clean() ?>
