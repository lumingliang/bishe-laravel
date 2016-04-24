<div class="container">
    <?php foreach ($posts as $post): ?>
        <?php echo $post->title; ?>
    <?php endforeach; ?>
</div>

<?php echo $posts->render(); ?>