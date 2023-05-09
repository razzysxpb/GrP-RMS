<table>
  <tr>
    <?php foreach ($students[0] as $field => $value) { ?>
      <th><?= ucwords(str_replace('_', ' ', $field)) ?></th>
    <?php } ?>
  </tr>
  <?php foreach ($students as $student) { ?>
    <tr>
      <?php foreach ($student as $value) { ?>
        <td><?= $value ?></td>
      <?php } ?>
    </tr>
  <?php } ?>
</table>

