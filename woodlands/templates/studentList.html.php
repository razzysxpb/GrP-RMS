<!-- Column headers table -->
<table>
  <thead>
    <tr>
      <th>Student ID</th>
      <th style="width: 15%">First Name</th>
      <th style="width: 5%">Middle Name</th>
      <th style="width: 15%">Surname</th>
      <th style="width: 5%">Email</th>
      <th>&nbsp;</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($students as $student) { ?>
      <tr>
        <td><?= $student->students_id ?></td>
        <td><?= $student->firstname ?></td>
        <td><?= $student->middlename ?></td>
        <td><?= $student->surname ?></td>
        <td><?= $student->email ?></td>
        <td>
          <button onclick="openPopup('<?= $student->students_id ?>')">View</button>
          <button onclick="window.location.href='/students/manageStudent?id=<?= $student->students_id ?>'">Edit</button>

          <form method="post" action="/students/delete" onsubmit="return confirm('Are you sure you want to delete <?= $student->firstname ?> <?= $student->surname ?>?')">
            <input type="hidden" name="id" value="<?= $student->students_id ?>" />
            <button type="submit">Delete</button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Full student information pop-up template -->
<div id="studentDetailsPopup" style="display: none;">
  <?php foreach ($students as $student) { ?>
    <div id="studentDetails<?= $student->students_id ?>">
      <h3>Student Details - <?= $student->students_id ?></h3>
      <p><strong>First Name:</strong> <?= $student->firstname ?></p>
      <p><strong>Middle Name:</strong> <?= $student->middlename ?></p>
      <p><strong>Surname:</strong> <?= $student->surname ?></p>
      <p><strong>Email:</strong> <?= $student->email ?></p>
      <p><strong>Term Street:</strong> <?= $student->term_street ?></p>
      <p><strong>Term Town:</strong> <?= $student->term_town ?></p>
      <!-- Add more student fields here -->
    </div>
  <?php } ?>
</div>

<script>
  function openPopup(studentId) {
    var popupContent = document.getElementById('studentDetails' + studentId).innerHTML;
    var popupWindow = window.open('', 'Student Details', 'width=400,height=400');
    popupWindow.document.write('<html><head><title>Student Details</title></head><body>' + popupContent + '</body></html>');

    // Close the popup window when clicked outside
    popupWindow.document.addEventListener('click', function() {
      popupWindow.close();
    });
  }
</script>
