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
        <footer><?= $site->acknowledgement() ?></footer>
    </body>
</html>
