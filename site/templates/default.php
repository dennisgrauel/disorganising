<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $site->title() ?></title>
    <?= css('assets/css/style.css') ?>
    <link rel="stylesheet" href="https://use.typekit.net/qhr3vpf.css">
  </head>
  <body>
    <header><?= $site->heading() ?></header>
    <div class="about">
      <?= $site->about()->toBlocks()->limit(1) ?>
      <p><a href="#">[more …]</a></p>
    </div>

    <main>

      <?php $works = $site->children()->listed() ?>

      <?php foreach ($works as $work): ?>

      <?php if ($work->intendedTemplate() == 'dinner') : ?>

      <a href="#" class="dinner">
        <div>
          <h1>disorganising dinners</h1>
          <h4><?= $work->number() ?></h4>

          <?= $work->text()->toBlocks() ?>

        </div>
      </a>

      <?php else : ?>

      <a href="#" class="work">
        <div>
          <h4><?= $work->classification() ?></h4>
          <h2><?= $work->title() ?></h2>
          <h3><?= $work->author() ?></h3>

          <?php if ($work->preview()->toBool() === true) : ?>
          <p class="excerpt"><?= $work->excerpt() ?></p>

          <?php else : ?>

          <figure>
            <img src="<?= $work->image()->url() ?>" alt="">
          </figure>

          <?php endif; ?>

        </div>
      </a>

      <?php endif; ?>

      <?php endforeach ?>

      <!-- CONTENT PANES -->

      <?php foreach ($site->children()->listed()->filterBy('intendedTemplate', 'modular') as $work) : ?>

      <div class="content-bg">

      </div>
      <div class="content-pane">
        <h5>(CLOSE)</h5>
        <h1 data-font='<?= $work->font() ?>'><?= $work->title() ?></h2>
        <h3><?= $work->author() ?></h3>
        <?= $work->text()->toBlocks() ?>

      </div>

      <?php endforeach ?>

    </main>



    <footer>

      <div>
        <label class="filter-container">
          <h4>Proposal</h4>
          <input type="checkbox">
          <span class="checkmark"></span>
        </label>
        <label class="filter-container">
          <h4>Essay</h4>
          <input type="checkbox">
          <span class="checkmark"></span>
        </label>
        <label class="filter-container">
          <h4>Interview</h4>
          <input type="checkbox">
          <span class="checkmark"></span>
        </label>
      </div>

      <div class="acknowledgement">
        <?= $site->acknowledgement() ?>
      </div>

    </footer>

  </body>
</html>
