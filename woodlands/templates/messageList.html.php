<!-- Column headers table -->
<table>
  <thead>
    <tr>
      <th>Message ID</th>
      <th style="width: 50%">Title</th>
      <th>Description</th>
      <th>Date</th>
      <th>Student ID</th>
      <th>Staff ID</th>
      <th>&nbsp;</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($messages as $message) { ?>
      <tr>
        <td><?= $message->message_id ?></td>
        <td><?= $message->title ?></td>
        <td><?= $message->description ?></td>
        <td><?= $message->date ?></td>
        <td><?= $message->students_id ?></td>
        <td><?= $message->staff_id ?></td>
        <td>
          <button onclick="openPopup('<?= $message->message_id ?>')">View</button>
          <a href="/messages/manageMessage?id=<?= $message->message_id ?>">Edit</a>

          <form method="post" action="/messages/delete" onsubmit="return confirm('Are you sure you want to delete the message <?= $message->title ?>?')">
            <input type="hidden" name="id" value="<?= $message->message_id ?>" />
            <input type="submit" name="submit" value="Delete" />
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Full message information pop-up template -->
<div id="messageDetailsPopup" style="display: none;">
  <?php foreach ($messages as $message) { ?>
    <div id="messageDetails<?= $message->message_id ?>">
      <h3>Message Details - <?= $message->message_id ?></h3>
      <p><strong>Title:</strong> <?= $message->title ?></p>
      <p><strong>Description:</strong> <?= $message->description ?></p>
      <p><strong>Date:</strong> <?= $message->date ?></p>
      <p><strong>Student ID:</strong> <?= $message->students_id ?></p>
      <p><strong>Staff ID:</strong> <?= $message->staff_id ?></p>
      <!-- Add more message fields here -->
    </div>
  <?php } ?>
</div>

<script>
  function openPopup(messageId) {
    var popupContent = document.getElementById('messageDetails' + messageId).innerHTML;
    var popupWindow = window.open('', 'Message Details', 'width=400,height=400');
    popupWindow.document.write('<html><head><title>Message Details</title></head><body>' + popupContent + '</body></html>');

    // Close the popup window when clicked outside
    popupWindow.document.addEventListener('click', function() {
      popupWindow.close();
    });
  }
</script>
