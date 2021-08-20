<?php

Kirby::plugin('dennisgrauel/map-block', [
  'blueprints' => [
    'blocks/map' => __DIR__ . '/blueprints/blocks/map.yml',
  ],
  'snippets' => [
    'blocks/map' => __DIR__ . '/snippets/blocks/map.php',
  ],
]);
