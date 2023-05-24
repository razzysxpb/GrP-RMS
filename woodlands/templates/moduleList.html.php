<!-- Column headers table -->
<table>
  <thead>
    <tr>
      <th>Module ID</th>
      <th style="width: 50%">Name</th>
      <th>Module Year</th>
      <th>Announcement</th>
      <th>&nbsp;</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($modules as $module) { 
      if (isset($_SESSION['teach']) && !$module->isOnModule($_SESSION['teach'])) {
        continue;
      } ?>
      <tr>
        <td><?= $module->module_id ?></td>
        <td><?= $module->name ?></td>
        <td><?= $module->module_year ?></td>
        <td><a href="/announcements/manageAnnouncement?module_id=<?= $module->module_id ?>"><button>Send Announcement</button></a></td>
        <td>
          <button onclick="openPopup('<?= $module->module_id ?>')">View</button>
          <?php if (isset($_SESSION['isAdmin'])) { ?>
            <button onclick="location.href='/modules/manageModule?id=<?= $module->module_id ?>';">Edit</button>
            <?php if ($_SESSION['isAdmin']) { ?>
              <form method="post" action="/modules/delete" onsubmit="return confirm('Are you sure you want to delete the module <?= $module->name ?>?')">
                <input type="hidden" name="id" value="<?= $module->module_id ?>" />
                <button type="submit" name="submit">Delete</button>
              </form>
            <?php } ?>
          <?php } ?>
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

    popupWindow.document.addEventListener('click', function() {
      popupWindow.close();
    });
  }

  document.addEventListener('DOMContentLoaded', () => {
    const moduleTable = document.querySelector('table');
    const moduleRows = moduleTable.querySelectorAll('tbody tr');
    const searchInput = document.getElementById('search-input');

    searchInput.addEventListener('input', () => {
      const searchQuery = searchInput.value.toLowerCase();

      moduleRows.forEach((row) => {
        const moduleID = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
        const moduleName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

        if (moduleID.includes(searchQuery) || moduleName.includes(searchQuery)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
</script>
