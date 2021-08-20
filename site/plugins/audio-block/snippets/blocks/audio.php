<?php if ($file = $block->source()->toFile()): ?>
  <div class="audio-container">

    <audio controls>
      <source src="<?= $file->url() ?>" type="<?= $file->mime() ?>">
      Your browser does not support the audio element.
    </audio>

    <?php if ($caption = $block->caption()): ?>
      <figcaption>
        <?= $caption  ?>
      </figcaption>
    <?php endif ?>

  </div>
<?php endif ?>
