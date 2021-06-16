<?php
$rows = $block->rows()->toStructure();
if($rows->isNotEmpty()):
?>
<table class="block-table">
  <?php foreach( $rows as $row): ?>
    <tr>
      <td><?= $row->timestamp() ?></td>
      <td><?= $row->voice() ?></td>
      <td><?= $row->text() ?></td>
    </tr>
  <?php endforeach ?>
</table>
<?php endif; ?>
