<!-- Column headers table -->
<table>
  <thead>
    <tr>
      <th>Module ID</th>
      <th style="width: 50%">Name</th>
      <th>Module Year</th>
      <th>&nbsp;</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($modules as $module) { ?>
      <tr>
        <td><?= $module->module_id ?></td>
        <td><?= $module->name ?></td>
        <td><?= $module->module_year ?></td>
        <td>
          <button onclick="openPopup('<?= $module->module_id ?>')">View Details</button>
          <a href="/modules/manageModule?id=<?= $module->module_id ?>">Edit Details</a>

          <form method="post" action="/modules/delete" onsubmit="return confirm('Are you sure you want to delete the module <?= $module->name ?>?')">
            <input type="hidden" name="id" value="<?= $module->module_id ?>" />
            <input type="submit" name="submit" value="Delete" />
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Full module information pop-up template -->
<div id="moduleDetailsPopup" style="display: none;">
  <?php foreach ($modules as $module) { ?>
    <div id="moduleDetails<?= $module->module_id ?>">
      <h3>Module Details - <?= $module->module_id ?></h3>
      <p><strong>Name:</strong> <?= $module->name ?></p>
      <p><strong>Module Year:</strong> <?= $module->module_year ?></p>
      <!-- Add more module fields here -->
    </div>
  <?php } ?>
</div>

<script>
  function openPopup(moduleId) {
    var popupContent = document.getElementById('moduleDetails' + moduleId).innerHTML;
    var popupWindow = window.open('', 'Module Details', 'width=400,height=400');
    popupWindow.document.write('<html><head><title>Module Details</title></head><body>' + popupContent + '</body></html>');

    // Close the popup window when clicked outside
    popupWindow.document.addEventListener('click', function() {
      popupWindow.close();
    });
  }
</script>
