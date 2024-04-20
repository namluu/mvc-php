<?php $title = 'Post' ?>

<?php ob_start() ?>
<h1><?= $post['title'] ?></h1>
<div><?= $post['content'] ?></div>
<?php $content = ob_get_clean() ?>
