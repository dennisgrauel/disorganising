<?php if ($block->iframe()->isNotEmpty()): ?>
<figure class="figure-map">
  <div class="map-container">
    <?= $block->iframe() ?>
  </div>
  <?php if ($block->caption()->isNotEmpty()): ?>
  <figcaption><?= $block->caption() ?></figcaption>
  <?php endif ?>
</figure>
<?php endif ?>
