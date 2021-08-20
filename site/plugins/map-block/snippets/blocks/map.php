<?php if ($block->url()->isNotEmpty()): ?>
<figure class="figure-video">
  <div class="video-container">
    <?= video($block->url()) ?>
  </div>
  <?php if ($block->caption()->isNotEmpty()): ?>
  <figcaption><?= $block->caption() ?></figcaption>
  <?php endif ?>
</figure>
<?php endif ?>
