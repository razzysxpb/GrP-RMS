<!-- Column headers table -->
<table>
  <thead>
    <tr>
      <th>Announcement ID</th>
      <th>Module</th>
      <th style="width: 30%">Title</th>
      <th style="width: 40%">Description</th>
      <th>Date</th>
      <th>&nbsp;</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($announcements as $announcement) { ?>
      <tr>
        <td><?= $announcement->announcement_id ?></td>
        <td><?= $announcement->moduleTitle() ?></td>
        <td><?= $announcement->title ?></td>
        <td><?= $announcement->description ?></td>
        <td><?= $announcement->date ?></td>
        <td>
          <button onclick="openPopup('<?= $announcement->announcement_id ?>')">View</button>
          <a href="/announcements/manageAnnouncement?id=<?= $announcement->announcement_id ?>"><button>Edit</button></a>

          <form method="post" action="/announcements/delete" onsubmit="return confirm('Are you sure you want to delete the announcement <?= $announcement->title ?>?')">
            <input type="hidden" name="id" value="<?= $announcement->announcement_id ?>" />
            <input type="submit" name="submit" value="Delete" />
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Full announcement information pop-up template -->
<div id="announcementDetailsPopup" style="display: none;">
  <?php foreach ($announcements as $announcement) { ?>
    <div id="announcementDetails<?= $announcement->announcement_id ?>">
      <h3>Announcement Details - <?= $announcement->announcement_id ?></h3>
      <p><strong>Title:</strong> <?= $announcement->title ?></p>
      <p><strong>Description:</strong> <?= $announcement->description ?></p>
      <p><strong>Date:</strong> <?= $announcement->date ?></p>
      <!-- Add more announcement fields here -->
    </div>
  <?php } ?>
</div>

<script>
  function openPopup(announcementId) {
    var popupContent = document.getElementById('announcementDetails' + announcementId).innerHTML;
    var popupWindow = window.open('', 'Announcement Details', 'width=400,height=400');
    popupWindow.document.write('<html><head><title>Announcement Details</title></head><body>' + popupContent + '</body></html>');

    // Close the popup window when clicked outside
    popupWindow.document.addEventListener('click', function() {
      popupWindow.close();
    });
  }
</script>
