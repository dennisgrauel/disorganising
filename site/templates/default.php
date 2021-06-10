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

    <header>
      <?= $site->headline()->toBlocks()->shuffle()->limit(1) ?>
    </header>

    <div class="about">
      <?= $site->about()->toBlocks()->limit(1) ?>
      <p><a href="#" onclick="openPane('about-pane')">[more …]</a></p>
    </div>

    <div class="acknowledgement-mobile">
      <?= $site->acknowledgement() ?>
    </div>

    <div id="about-pane">

      <div id="about-bg"></div>

      <a href="#" onclick="closePane('about-pane', '<?= $site->url() ?>')"><h5>(CLOSE)</h5></a>
      <?= $site->about()->toBlocks() ?>
    </div>

    <main>

      <!-- FEED -->

      <div id="feed">

        <?php $works = $site->children()->listed() ?>
        <?php $i = 1 ?>

        <?php foreach ($works as $work): ?>

        <?php if ($work->intendedTemplate() == 'dinner') : ?>

        <a href="#" class="dinner">
          <div>
            <h1>disorganising dinners</h1>
            <h4><?= $work->number() ?></h4>

            <?= $work->text()->toBlocks() ?>

            <?php $i = 1 ?>

          </div>
        </a>

        <?php else : ?>

        <a href="#" class="work

          <?php if ($i % 2 !== 0) : ?>

          index-<?= $i ?>

          <?php endif ?>
          "

          <?php foreach ($work->classification()->split() as $tag) : ?>

          data-type="<?= $tag ?>"

          <?php endforeach ?>

          onclick="openPane(<?= $work->num() ?>, '<?= $work->url() ?>')">
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

            <?php $i++ ?>

          </div>
        </a>

        <?php endif; ?>

        <?php endforeach ?>

      </div>



      <!-- CONTENT PANES -->

      <?php foreach ($site->children()->listed()->filterBy('intendedTemplate', 'modular') as $work) : ?>


      <div class="content-pane" id="<?= $work->num() ?>">

        <div class="content-bg">
        </div>

        <div class="content">
          <a href="#" onclick="closePane(<?= $work->num() ?>, '<?= $site->url() ?>')"><h5>(CLOSE)</h5></a>
          <h1 data-font='<?= $work->font() ?>'><?= $work->title() ?></h2>
          <div class="published">
            <?= $work->published()->toDate('j F Y') ?>
          </div>
          <h3 class="author"><?= $work->author() ?></h3>
          <h4 class="subtitle"><?= $work->subtitle() ?></h4>

          <?php if ($work->audio()->isNotEmpty()) : ?>
          <?= $work->audio()->html() ?>
          <?php endif ?>

          <audio src="">

          </audio>

          <?= $work->text()->toBlocks() ?>
        </div>

      </div>

      <?php endforeach ?>

    </main>

    <!-- FOOTER & TAG FILTERS -->

    <footer>

      <div id="filters">

        <?php $tags = $site->children->listed()->pluck('classification', ',', true);

        foreach ($tags as $tag) :?>

        <label class="filter-container">
          <h4><?= $tag ?></h4>
          <input type="checkbox" value="<?= $tag ?>"  onChange="showHide('<?= $tag ?>')" checked>
          <span class="checkmark"></span>
        </label>

        <?php endforeach ?>

      </div>

      <div class="acknowledgement">
        <?= $site->acknowledgement() ?>
      </div>

    </footer>

    <?= js('assets/js/filter.js') ?>
    <?= js('assets/js/panes.js') ?>

  </body>
</html>
