<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $site->title() ?></title>
    <?= css('assets/css/style.css') ?>
    <link rel="stylesheet" href="https://use.typekit.net/qhr3vpf.css">
  </head>
  <body onkeypress="ESCclose(event)">

    <header>
      <a href="<?= $site->url() ?>">
        <?= $site->headline()->toBlocks()->shuffle()->limit(1) ?>
      </a>
    </header>

    <div class="about">
      <?= $site->about()->toBlocks()->limit(1) ?>
      <p><a href="javascript:void(0)" onclick="openPane('about-pane')">[more …]</a></p>
    </div>

    <div class="acknowledgement-mobile">
      <?= $site->acknowledgement() ?>
    </div>

    <div id="about-pane">

      <div id="about-bg"></div>

      <a href="javascript:void(0)" onclick="closePane('about-pane', '<?= $site->url() ?>')"><h5>(CLOSE)</h5></a>

      <div id="about-text">
        <h2>ABOUT</h2>
        <?= $site->about()->toBlocks() ?>
      </div>
      <div id="contributors">
        <h2>CONTRIBUTORS</h2>
        <?= $site->contributors()->toBlocks() ?>
      </div>

    </div>

    <nav>

      <!-- FEED -->

      <div id="feed">

        <?php $works = $site->children()->listed() ?>
        <?php $i = 1 ?>

        <?php foreach ($works as $work): ?>

          <?php if ($work->intendedTemplate() == 'dinner') : ?>

            <a href="javascript:void(0)" class="dinner" onclick="openPane('<?= $work->slug() ?>', '<?= $work->url() ?>')">
              <div>
                <h1>disorganising dinners</h1>
                <h4><?= $work->number() ?></h4>

                <?= $work->text()->toBlocks() ?>

                <?php $i = 1 ?>

              </div>
            </a>

          <?php else : ?>

            <a href="javascript:void(0)" class="work

              <?php if ($i % 2 !== 0) : ?>

              index-<?= $i ?>

              <?php endif ?>
              "

              <?php foreach ($work->classification()->split() as $tag) : ?>

              data-type="<?= $tag ?>"

              <?php endforeach ?>

              onclick="openPane('<?= $work->slug() ?>', '<?= $work->url() ?>')">
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

    </nav>

      <!-- CONTENT PANES -->

    <main>

      <?php foreach ($site->children()->listed()->filterBy('intendedTemplate', 'modular') as $work) : ?>

        <div class="content-pane" id="<?= $work->slug() ?>" aria-hidden="true" data-slug="<?= $work->slug() ?>">

          <div class="content-bg">
          </div>

          <div class="content">
            <a href="javascript:void(0)" onclick="closePane('<?= $work->slug() ?>', '<?= $site->url() ?>')"><h5>(CLOSE)</h5></a>
            <h1 data-font='<?= $work->font() ?>'><?= $work->title() ?></h1>
            <div class="published">
              <?= $work->published()->toDate('j F Y') ?>
            </div>
            <h3 class="author"><?= $work->author() ?></h3>

            <?php if ($work->subtitle()->isNotEmpty()) : ?>
              <h4 class="subtitle"><?= $work->subtitle() ?></h4>
            <?php endif ?>

            <?php if ($work->audio()->isNotEmpty()) : ?>
              <audio src="<?= $work->audio()->url() ?>" controls>
                Your browser does not support audio.
              </audio>
            <?php endif ?>


            <?php $blocks  = $work->text()->toBlocks();
              $startAt = 1;
              $notes   = [];
              $applyTo = ['text', 'markdown']; ?>

              <?php foreach($blocks as $block):
                if(in_array($block->type(), $applyTo)):
                  // we get the text with footnotes references but no bottom footnotes container
                  $text     = $block->text()->withoutBlocksFootnotes($startAt);
                  // instead, we get an array of the block's footnotes, and append it to our $notes array
                  $notesArr = $block->text()->onlyBlocksFootnotes($startAt);
                  if($notesArr !== '') {
                    foreach($notesArr as $f) { $notes[] = $f; }
                  }
                  // the first note of the next block will now start at (number of current notes + 1)
                  $startAt = count($notes) + 1;
                  echo $text;
                else:
                  echo $block;
                endif;
                endforeach; ?>

                <?php if(count($notes)): ?>
                  <div class="notes-container">
                    <!-- <hr> -->
                    <?php snippet('footnotes_container', ['footnotes' => implode('', $notes)]) ?>
                  </div>
                <?php endif; ?>

            <div class="bio">
              <!-- <hr> -->
              <?= $work->bio()->toBlocks() ?>
            </div>

          </div>

        </div>

      <?php endforeach ?>

      <!-- DINNER PANES -->

      <?php foreach ($site->children()->listed()->filterBy('IntendedTemplate', 'dinner') as $dinner) : ?>

        <div class="content-pane" id="<?= $dinner->slug() ?>" aria-hidden="true">

          <div class="content-bg">
          </div>

          <div class="content dinner-pane">
            <a href="javascript:void(0)" onclick="closePane('<?= $dinner->slug() ?>', '<?= $dinner->url() ?>')"><h5>(CLOSE)</h5></a>
            <h1 data-font="nimbus-sans-condensed">disorganising dinner <?= $dinner->number() ?></h1>
            <div class="published">
              <?= $dinner->date()->toDate('j F Y') ?>
            </div>

            <?= $dinner->text()->toBlocks() ?>

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
            <input type="checkbox" value="<?= $tag ?>"  onChange="showHide('<?= $tag ?>')" checked>
            <h4><?= $tag ?></h4>
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
