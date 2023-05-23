<!-- Column headers table -->
<table>
  <thead>
    <tr>
      <th>Staff ID</th>
      <th style="width: 15%">First Name</th>
      <th style="width: 5%">Middle Name</th>
      <th style="width: 15%">Surname</th>
      <th style="width: 5%">Email</th>
      <th style="width: 5%">&nbsp;</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($staffMembers as $staff) { ?>
      <tr>
        <td><?= $staff->staff_id ?></td>
        <td><?= $staff->firstname ?></td>
        <td><?= $staff->middlename ?></td>
        <td><?= $staff->surname ?></td>
        <td><?= $staff->email ?></td>
        <td>
          <button onclick="openPopup('<?= $staff->staff_id ?>')">View Details</button>
          <a href="/staff/manageStaff?id=<?= $staff->staff_id ?>">Edit Details</a>

          <form method="post" action="/staff/delete" onsubmit="return confirm('Are you sure you want to delete <?= $staff->firstname ?> <?= $staff->surname ?>?')">
            <input type="hidden" name="id" value="<?= $staff->staff_id ?>" />
            <input type="submit" name="submit" value="Delete" />
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Full staff information pop-up template -->
<div id="staffDetailsPopup" style="display: none;">
  <?php foreach ($staffMembers as $staff) { ?>
    <div id="staffDetails<?= $staff->staff_id ?>">
      <h3>Staff Details - <?= $staff->staff_id ?></h3>
      <p><strong>First Name:</strong> <?= $staff->firstname ?></p>
      <p><strong>Middle Name:</strong> <?= $staff->middlename ?></p>
      <p><strong>Surname:</strong> <?= $staff->surname ?></p>
      <p><strong>Email:</strong> <?= $staff->email ?></p>
      <!-- Add more staff fields here -->
    </div>
  <?php } ?>
</div>

<script>
  function openPopup(staffId) {
    var popupContent = document.getElementById('staffDetails' + staffId).innerHTML;
    var popupWindow = window.open('', 'Staff Details', 'width=400,height=400');
    popupWindow.document.write('<html><head><title>Staff Details</title></head><body>' + popupContent + '</body></html>');

    // Close the popup window when clicked outside
    popupWindow.document.addEventListener('click', function() {
      popupWindow.close();
    });
  }
</script>
