<?php /** @var \Kirby\Cms\Block $block */ ?>
<div class="gallery">

    <?php $i = 1 ?>

    <?php foreach ($block->images()->toFiles() as $image): ?>

      <figure>
        <?= $image ?>
        <figcaption><?= sprintf("%02d", $i) ?>.</figcaption>
      </figure>

    <?php $i++ ?>

    <?php endforeach ?>

    <div class="captions">

      <?php $i = 1 ?>

      <?php foreach ($block->images()->toFiles() as $image): ?>

      <?php if ($image->caption()->isNotEmpty()) : ?>

        <figcaption>
          <?= sprintf("%02d", $i) ?>. <?= $image->caption() ?>
        </figcaption>

      <?php endif; ?>

      <?php $i++ ?>

      <?php endforeach ?>
    </div>


</div>
